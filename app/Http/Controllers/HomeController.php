<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function addProduct(){
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




        DB::table('products')->insert($data);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add-product')->with($notification);
    }

    public function allProducts(){
        $products = DB::table('products')->paginate(20);

        return view('backend.products', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        unlink('public/productImages/' . $product->image);

        DB::table('products')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }

    public function editProduct($id){
        $product = DB::table('products')->where('id', $id)->first();

        return view('backend.editProduct', compact('product'));
    }

    public function storeEditProduct(Request $request, $id){
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

        DB::table('products')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-products')->with($notification);
    }


}
