<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
        $session = FacadesSession::getId();
        $cart = Cart::with('product')->get();
        $total = 0;
        $discount = 0;
        $count = 0;
        $key = 0;

        if (Auth::check()) {
            $user = Auth::user()->id;
        }else{
            $user = uniqid();
        }
        foreach ($cart as  $value) {
            if ($value->session == $session OR $value->user_id ==  $user) {
                $key ++;
                $count += $value->id;
                $total += ($value->product->price - $value->product->discount) * $value->qty;
                $discount += $value->product->discount * $value->qty;
            }
        }
        return view('cart', compact('session', 'cart', 'total', 'discount', 'key', 'user'));
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
        $session = FacadesSession::getId();
        // $cookie = Cookie::queue('cart', $session, time() + 84600);
        $carts = Cart::get();
        foreach ($carts as $value) {
            if ($value->session == $session) {
                $carted = Cart::where('product_id', $id)->get();
                if (count($carted) != 0) {
                    // dd($carted);
                    session()->flash('cart', 'Already Added!');
                    return redirect()->back();
                }
            }
        }
        
        $cart = new Cart();
        $cart->session = $session;
        $cart->product_id = $id;
        if (Auth::user()) {
            $cart->user_id = Auth::user()->id;
        }
        $cart->save();
        session()->flash('cart', 'Added this product in cart');
        return redirect()->back();
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
        return redirect()->back();
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
