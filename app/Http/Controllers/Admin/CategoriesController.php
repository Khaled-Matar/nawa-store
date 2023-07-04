<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select([
            'categories.*',
        ])->simplePaginate(10);
        // 10 categories at 1 page  
        return view('admin.categories.index', [
            'title' => 'Categories List',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.categories.create',
            [
                'category' => new Category(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // $category = Category::create($request->validated());
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Uploaded File Object
            $path = $file->store('uploads/images', 'public'); // return file path after store
            $data['image'] = $path;
        }
        $category = Category::create($data);

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
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id); //return Model Object or NUll
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
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Uploaded File Object
            $path = $file->store('uploads/images', 'public'); // return file path after store
            $data['image'] = $path;
        }
        $old_image = $category->image;
        $category->update($data);
        if ($old_image && $old_image != $category->image) {
            Storage::disk('public')->delete($old_image);
        } else {
            $category->update($request->validated());
        }

        return redirect()->route('categories.index')
            ->with('success', "Category ({$category->name}) Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', "Category ({$category->name}) Deleted");
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->paginate();
        return view(
            'admin.categories.trashed',
            [
                'categories' => $categories,
            ]
        );
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.index')
            ->with('success', "Category ({$category->name}) Restored");
    }


    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('categories.index')
            ->with('success', "Category ({$category->name}) deleted forever!");
    }
}
