<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResource;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = Session::getId();
        $cart = Cart::with('product.category', 'product.subcategory', 'product.color')->get();
        $total = 0;
        $discount = 0;
        $count = 0;
        $key = 0;
        $zero = 1;
        $stock[] = 1;

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
            $stock[] = $value->product->stock;
        }
        
        foreach($stock as  $value){
            if ($value == 0) {
                $zero = 0;
            }
        }

        return ProductResource::collection($cart);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::getId();
        $carts = Cart::get();
        foreach ($carts as $value) {
            if ($value->session == $session) {
                $carted = Cart::where('product_id', $id)->get();
                if (count($carted) != 0) {
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
        
        return new CartResource($cart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
