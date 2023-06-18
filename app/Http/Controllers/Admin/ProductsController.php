<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
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
        $categories = Category::all();
        return view('admin.products.create', [
            'product' => new Product(),
            'categories' => $categories,
            'status_options' => [
                'active' => 'Active',
                'draft' => 'Draft',
                'archived' => 'Archived'
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // $rules = $this->rules();
        // $messages = $this->messages();
        // $request->validate($rules, $messages);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->status = $request->input('status', 'active');
        $product->compare_price = $request->input('compare_price');
        $product->image = $request->input('image');
        $product->save();
        //prg : post redirect get
        // return redirect()->route('products.index');
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) Added");
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
        $categories = Category::all(); //return Model Object or NUll
        return view(
            'admin.products.edit',
            [
                'product' => $product,
                'categories' => $categories,
                'status_options' => [
                    'active' => 'Active',
                    'draft' => 'Draft',
                    'archived' => 'Archived'
                ],
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        // $rules = $this->rules($id);
        // $messages = $this->messages();
        // $request->validate($rules, $messages);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->status = $request->input('status', 'active');
        $product->compare_price = $request->input('compare_price');
        $product->image = $request->input('image');
        $product->save();
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Product::where('id', '=', $id)->delete();
        // Product::destroy($id);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) deleted");
    }

    // protected function messages()
    // {
    //     return[
    //         'required' => ':attribute field is required!!',           // :attribute = field name
    //         'unquie' => 'The value already exists!',
    //         'name.required' => 'The product name is mandatory!', // speciallies the field name
    //     ];
    // }
    // protected function rules($id = 0)
    // {
    //     return[
    //         'name' => 'required|max:255|min:3',
    //         'slug' => 'required|unique:products,slug',
    //         'category_id' => 'nullable|int|exists:categories,id',
    //         'description' => 'nullable|string',
    //         'short_description' => 'string|max:500',
    //         'price' => 'required|numeric|min:0',
    //         'compare_price' => 'nullable|numeric|min:0|gt:price',       //gt = greater than  // gte = greater than or equal =
    //         'image' => 'nullable|image|dimensions:min_width=400,min_height=300,|max:500',   // 500KB  // 1024KB = 1MB
    //         'status' => 'required|in:active,draft,archived',
    //         // 'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg,image/gif',   /// more secure than mimes and it used for imaes/files/videos
    //     ];
    // }
}
