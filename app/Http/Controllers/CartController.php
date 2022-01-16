<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $session = session()->getId();
        $cart = Cart::with('product')->get();
        $total = 0;
        $discount = 0;
        $count = 0;
        $key = 0;
        foreach ($cart as  $value) {
            if ($value->session == $session ) {
                $key ++;
                $count += $value->id;
                $total += ($value->product->price - $value->product->discount) * $value->qty;
                $discount += $value->product->discount * $value->qty;
            }
        }
        return view('cart', compact('session', 'cart', 'total', 'discount', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = session()->getId();
        $cart = new Cart();
        $cart->session = $session;
        $cart->product_id = $id;
        if (Auth::user()) {
            $cart->user_id = Auth::user()->id;
        }
        $cart->save();

        return redirect()->route('back')->with('cart', 'Product added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->qty = $request->quantity;
        if (Auth::user()) {
            $cart->user_id = Auth::user()->id;
        }
        $cart->save();
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index');
    }
}
