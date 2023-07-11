<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use NumberFormatter;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cookie_id = $request->cookie('cart_id');
        $cart = Cart::with('product')->where('cookie_id', '=', $cookie_id)->get();

        $total = $cart->sum(function ($item) {
            return $item->product->price * $item['quantity'];
        });
        foreach ($cart as $item) {
            $total += $item->product->price * $item->quantity;
        }
        $formatter = new NumberFormatter('en', NumberFormatter::CURRENCY);

        return view('shop.cart', [
            'cart' => $cart,
            'total' => $formatter->formatCurrency($total, 'USD'),
        ]);
    }
    //display all products added by user and also show quantity for each product
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['nullable', 'int', 'min:1', 'max:100'],
        ]);

        $cookie_id = $request->cookie('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30);
        }

        $item = Cart::where('cookie_id', '=', $cookie_id)
            ->where('product_id', '=', $request->input('product_id'))
            ->first();
        if ($item) {
            $item->increment('quantity', $request->input('quantity', 1));
        } else {
            Cart::create([
                'cookie_id' => $cookie_id,
                'user_id' => Auth::id(),
                'product_id' => $request->input('product_id'),
                'quantity' =>  $request->input('quantity', 1),
            ]);
        }

        return back()->with('success', 'Product Added to cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
