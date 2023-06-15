<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Select products.*, categories.name as category_name
        // FROM products                             
        // INNER JOIN  categories ON categories.id = products.category_id

        // $products = DB::table('products')
        // ->leftJoin('categories','categories.id','=', 'products.category_id')
        // ->select([
        //     'products.*',
        //     'categories.name as category_name',
        // ])->get();  //return a Collection of std object = "array"
        // dd($products);
        // == //
          // Select * FROM products,
        $products = Product::leftJoin('categories','categories.id','=', 'products.category_id')
        ->select([
            'products.*',
            'categories.name as category_name',
        ])->get(); // Collection of Product Model

        return view('admin.products.index', [
            'title' => 'Products List',
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->compare_price = $request->input('compare_price');
        $product->image = $request->input('image');
        $product->save();
        //prg : post redirect get
        return redirect()->route('products.index');
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
        // $product = Product::where('id', '=', $id)->first(); // return Model
        $product = Product::findOrFail($id); //return Model Object or NUll
        return view ('admin.products.edit',
        [
            'product' => $product,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->compare_price = $request->input('compare_price');
        $product->image = $request->input('image');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        // $product =Product::findOrFail($id);
        // $product->delete();
        // Product::where('id', '=', $id)->delete();
        return redirect()->route('products.index');
    }
}
