<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $product;
    public function __construct(products $product)
    {
        $this->middleware('auth');
        $this->product = new products();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function addProduct()
    {
        return view('backend.add-product');
    }

    public function storeProduct(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'status' => ['required'],

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['status'] = $request->status;

        $img_ext = $request->file('image')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $path = $request->file('image')->move(public_path() . '/productImages/', $filename);
        $data['image'] = $filename;

        $this->product->create($data);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add-product')->with($notification);
    }

    public function allProducts()
    {
        $response['products'] = $this->product->all();

        return view('backend.products',)->with($response);
    }

    public function deleteProduct($id)
    {
        $product = $this->product->find($id);
        unlink('public/productImages/' . $product->image);

        $product->delete();


        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }

    public function editProduct($id)
    {
        $response['product'] = $this->product->find($id);

        return view('backend.editProduct')->with($response);
    }

    public function storeEditProduct(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'status' => ['required'],

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['status'] = $request->status;

        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path() . '/productImages/', $filename);
            $data['image'] = $filename;
            unlink('public/productImages/' . $request->oldimage);
        } else {
            $data['image'] = $request->oldimage;
        }

        $product = $this->product->find($id);
        $product->update($data);


        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }
}
