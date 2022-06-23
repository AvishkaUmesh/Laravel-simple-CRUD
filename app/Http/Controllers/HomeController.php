<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use domain\Facades\ProductFacade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function addProduct()
    {
        return ProductFacade::addProduct();
    }

    public function storeProduct(Request $request)
    {

        ProductFacade::storeProduct($request->all());

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add-product')->with($notification);
    }

    public function allProducts()
    {
        $response['products'] = ProductFacade::allProducts();
        return view('backend.products',)->with($response);
    }

    public function deleteProduct($id)
    {
        ProductFacade::deleteProduct($id);

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }

    public function editProduct($id)
    {
        $response['product'] = ProductFacade::editProduct($id);
        return view('backend.editProduct')->with($response);
    }

    public function storeEditProduct(Request $request, $id)
    {

        ProductFacade::storeEditProduct($request->all(), $id);
        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }
}
