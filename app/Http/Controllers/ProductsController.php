<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class ProductsController extends Controller
{
    public function __construct(Request $request)
    {
        if ($request->method() == 'GET') {

            $categories = Category::all();
            View::share([
                'categories' => $categories,
                'status_options' => Product::statusOptions(),
            ]);
        }
    }
    public function index(Request $request)
    {
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select([
                'products.*',
                'categories.name as category_name',
            ])
            ->filter($request->query())
            ->paginate(3);

        return view('shop.grids', [
            'title' => 'Shop Grid',
            'products' => $products,
        ]);
    }

    public function show($slug)
    {
        $product = Product::active()
            ->withoutGlobalScope('owner')
            ->where('slug', '=', $slug)
            ->firstOrFail();

        // $gallery = ProductImage::where('product_id', '=', $product->id)->get();
        return view('shop.products.show', [
            'product' => $product,
            // 'gallery' => $gallery,
        ]);
    }
}
