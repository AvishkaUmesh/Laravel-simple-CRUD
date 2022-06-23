<?php

namespace domain\Services;
use App\Models\products;

class ProductService
{
    protected $product;
    public function __construct()
    {
        $this->product = new products();
    }


    public function addProduct()
    {
        return view('backend.add-product');
    }

    public function storeProduct($data)
    {


        $img_ext = $data['image']->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $path = $data['image']->move(public_path() . '/productImages/', $filename);
        $data['image'] = $filename;

        $this->product->create($data);

    }

    public function allProducts()
    {
        return $this->product->all();

    }

    public function deleteProduct($id)
    {
        $product = $this->product->find($id);
        unlink('public/productImages/' . $product->image);

        $product->delete();


    }

    public function editProduct($id)
    {
        return $this->product->find($id);

    }

    public function storeEditProduct($data, $id)
    {

        if (isset($data['image'])) {
            $img_ext = $data['image']->getClientOriginalExtension();
            $filename = time() . '.' . $img_ext;
            $path = $data['image']->move(public_path() . '/productImages/', $filename);
            $data['image'] = $filename;
            unlink('public/productImages/' . $data['oldimage']);
        } else {
            $data['image'] = $data['oldimage'];
        }

        $product = $this->product->find($id);
        $product->update($data);

    }
}
