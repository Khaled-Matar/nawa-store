<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;

class CheckoutController extends Controller
{
    public function create()
    {
        $countries = Countries::getNames('en');
        return view('shop.checkout', [
            'countries' => $countries,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_first_name' => 'required',
            'customer_last_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'nullable',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_postal_code' => 'nullable',
            'customer_province' => 'nullable',
            'customer_country_code' => 'required|string|size:2',
        ]);
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';
        $validated['payment_status'] = 'pending';
        $validated['currency'] = 'USD';

        $cookie_id = $request->cookie('cart_id');
        $cart = Cart::with('product')->where('cookie_id', '=', $cookie_id)->get();

        $total = $cart->sum(function ($item) {
            return $item->product->price * $item['quantity'];
        });
        $validated['total'] = $total;

        // Insert Order lines
        DB::beginTransaction();
        try {
            // Create Order
            $order = Order::create($validated);
            // Insert Order
            foreach ($cart as $item) {
                OrderLine::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            //  Delete cart items
            // Cart::where('cookie_id', '=', $cookie_id)->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors([
                    'error' => $e->getMessage()
                ])
                ->with('error', $e->getMessage());
        }
        // Send notfication to super-admin
        $user = User::where('type', '=', 'super-admin')->first();
        $user->notify(new NewOrderNotification($order));

        // redirect to succces page
        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('shop.success');
    }
}
