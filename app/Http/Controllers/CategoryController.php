<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys= Categories::all();
        return view('category.index', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'type_laundry' => 'required|string',
            'working_time' => 'required|integer',
            'price' => 'required|integer',
        ])->validate();

        $category = new Categories($validateData);
        $category->save();

        return redirect(route('listCategory'))->with('success', 'Data Kategori Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::findOrFail($id);
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = validator($request->all(), [
            'type_laundry' => 'required|string',
            'working_time' => 'required|integer',
            'price' => 'required|integer',
        ])->validate();

        $category = Categories::findOrFail($id);

        $category->update([
            'type_laundry' => $request->type_laundry,
            'working_timw' => $request->working_time,
            'price' => $request->price
        ]);

        return redirect(route('listCategory'))->with('success', 'Data Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect(route('listCategory'))->with('success', 'Data Kategori Berhasil Dihapus');
    }
}