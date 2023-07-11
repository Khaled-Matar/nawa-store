<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Product::with(['user', 'category', 'gallery'])
            ->filter($request->query())
            ->paginate(5); // return json formatted data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $user = $request->user('sanctum');
        if (!$user->tokenCan('products.created')) {
            abort(403);
        };

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
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::with(['user', 'category', 'gallery'])
            ->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $user = $request->user('sanctum');
        if (!$user->tokenCan('products.update')) {
            abort(403);
        };

        $data = $request->validate([
            'name' => ['sometimes', 'required'],
            'category_id' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],

        ]);
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

        return [
            'message' => 'Product Updated',
            'product' => $product,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $user = $request->user('sanctum');
        if (!$user->tokenCan('products.delete')) {
            abort(403);
        };

        $product->delete();
        return [
            'message' => 'Product Deleted',
            // 'product' => $product,
        ];
    }
}
