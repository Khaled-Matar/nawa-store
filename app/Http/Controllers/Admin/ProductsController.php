<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    public function __construct(Request $request)
    {
        if($request->method() == 'GET'){

            $categories = Category::all();
            View::share([
                'categories' => $categories,
                'status_options' => Product::statusOptions(),
            ]);
        } 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
            ])
            ->filter($request->query())
            ->paginate(10); // Collection of Product Model // 5 products at 1 page
        // ->onlyTrashed()         // show products deleted only
        // ->withTrashed()            // show products with deleted
        // ->withoutGlobalScopes('owner') // stops global from divide showing products between users
        // ->active()
        // ->status('archived')
        // ->status('active')
        // ->status('draft')

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
        // $categories = Category::all();
        return view('admin.products.create', [
            'product' => new Product(),
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
        // $product = Product::create($request->only('name','slug'));
        // $product = Product::create( $request->all());
        // $product = Product::create($request->except('price'));
        /// == ///
        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->slug = $request->input('slug');
        // $product->category_id = $request->input('category_id');
        // $product->description = $request->input('description');
        // $product->short_description = $request->input('short_description');
        // $product->price = $request->input('price');
        // $product->status = $request->input('status', 'active');
        // $product->compare_price = $request->input('compare_price');
        // $product->image = $request->input('image');
        // $product->save();
        // prg : post redirect get
        // return redirect()->route('products.index');

        // Mass assignment
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Uploaded File Object
            $path = $file->store('uploads/images', 'public'); // return file path after store
            $data['image'] = $path;
        }
        $data['user_id'] = Auth::id();
        $product = Product::create($data);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file->store('uploads/images', 'public'),
                ]);
            }   // return array of returned files
        }
        // $product = Product::create($request->validated());
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) Created");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $product = Product::where('id', '=', $id)->first(); // return Model
        // $product = Product::findOrFail($id); //return Model Object or NUll
        // $categories = Category::all(); //return Model Object or NUll
        // $gallery = ProductImage::where('product_id', '=', $product->id)->get();
        return view(
            'admin.products.edit',
            [
                'product' => $product,
                'gallery' => $product->gallery,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        // $rules = $this->rules($id);
        // $messages = $this->messages();
        // $request->validate($rules, $messages);
        // $product = Product::findOrFail($id);
        // $product->name = $request->input('name');
        // $product->slug = $request->input('slug');
        // $product->description = $request->input('description');
        // $product->short_description = $request->input('short_description');
        // $product->price = $request->input('price');
        // $product->status = $request->input('status', 'active');
        // $product->compare_price = $request->input('compare_price');
        // $product->image = $request->input('image');
        // $product->save();
        //           =                //
        // Mass assignment
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Uploaded File Object
            $path = $file->store('uploads/images', 'public'); // return file path after store
            $data['image'] = $path;
        }
        $old_image = $product->image;
        $product->update($data);
        if ($old_image && $old_image != $product->image) {
            Storage::disk('public')->delete($old_image);
        }
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file->store('uploads/images', 'public'),
                ]);
            }   // return array of returned files
        }
        // $product->update($request->validated());
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Product::where('id', '=', $id)->delete();
        // Product::destroy($id);
        // $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) deleted");
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate();
        return view('admin.products.trashed', [
            'products' => $products,
        ]);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) Restored");
    }


    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        return redirect()->route('products.index')
            ->with('success', "Product ({$product->name}) deleted forever!");
    }
}
