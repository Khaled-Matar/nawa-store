<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return view('admin.categories.index', [
            'title' => 'Categories List',
            'categories' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255|min:3',
        ];
        $request->validate($rules);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        
        return redirect()->route('categories.index')
        ->with('success', "Category ({$category->name}) Added");
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
        $category = Category::findOrFail($id); //return Model Object or NUll
        return view(
            'admin.categories.edit',
            [
                'category' => $category,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|max:255|min:3',
        ];
        $request->validate($rules);
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.index')
        ->with('success', "Category ({$category->name}) Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  Category::destroy($id);
        //  return redirect()->route('categories.index')
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')
        ->with('success', "Category ({$category->name}) Deleted");
    }
}
