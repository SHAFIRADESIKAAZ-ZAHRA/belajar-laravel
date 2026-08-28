<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $title = "Manajemen Category";
        return view('category.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Category Baru";
        return view('category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        //return $validate;

        Category::create($validate);
        toast('Category Berhasil Ditambah!', 'success');
        return redirect()->route('category.index')->with('success', 'Category berhasil ditambah');
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
        $title = "Ubah Data Category";
        $edit = Category::find($id); // blank: select * from categories where id = $id
        $edit = Category::findOrFail($id); //404
        return view('category.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->name = $validate['name'];
        $category->save();

        toast('Category Berhasil Diubah!', 'success');
        return redirect()->route('category.index')->with('success', 'Category berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toast('Category Berhasil Dihapus!', 'success');
        return redirect()->route('category.index')->with('success', 'category berhasil di hapus');
    }
}