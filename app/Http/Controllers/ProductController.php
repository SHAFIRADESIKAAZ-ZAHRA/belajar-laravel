<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $title = "Manajemen Product";
        return view('product.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Product Baru";
        $categories = Category::all();
        return view('product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        //return $validate;

        Product::create($validate);
        toast('Product Berhasil Ditambah!', 'success');
        return redirect()->route('product.index')->with('success', 'Product berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Ubah Data Product";
        $edit = Product::find($id); // blank: select * from products where id = $id
        $edit = Product::findOrFail($id); //404
        $categories = Category::all();
        return view('product.edit', compact('title', 'edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $product->category_id = $validate['category_id'];
        $product->name        = $validate['name'];
        $product->price       = $validate['price'];
        $product->description = $validate['description'];
        $product->save();

        toast('Product Berhasil Diubah!', 'success');
        return redirect()->route('product.index')->with('success', 'Product berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toast('Product Berhasil Dihapus!', 'success');
        return redirect()->route('product.index')->with('success', 'product berhasil di hapus');
    }
}