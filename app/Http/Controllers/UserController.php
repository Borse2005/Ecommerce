<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Cache::remember('user', 10, function(){
            return User::with('role')->get();
        });
        $key = 1;
        return view('user.dashboard', compact('user','key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $cart = Cart::with('product')->get();
        $session = session()->getId();

        $total = 0;
        $discount = 0;
        $count = 0;
        $key = 0;
        
        foreach ($cart as  $value) {
            if ($value->session == $session OR $value->user_id ==  $user->id) {
                $key ++;
                $count += $value->id;
                $total += ($value->product->price - $value->product->discount) * $value->qty;
                $discount += $value->product->discount * $value->qty;
            }
        }
        $price = ($total). '00';
        return view('checkout.checkout', compact('user', 'cart', 'session', 'price'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $key = 1;
        return view('user.details', compact('user', 'key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // return view('checkout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update (UserRequest $request, User $user)
    {
        $validation = $request->validated();
        $user->fill($validation);
        $user->save();
        session()->flash('details', 'Your details has been Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
