<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Cache::remember('category', now()->minute(10), function(){
            return Category::all();
        });
        $product = Cache::remember('product', now()->minutes(10), function(){
            return Product::take(4)->get();
        });
        $user = Cache::remember('user', now()->minutes(10), function(){
            return User::get();
        });
        $session = Cache::remember('session', now()->minutes(10), function(){
            return Session::all();
        });
        $color = Cache::remember('color',now()->minutes(10), function(){
            return Color::all();
        });
        $order = Cache::remember('order', now()->minute(10), function(){
            return Order::all();
        });
        return view('dashboard', compact('category', 'product', 'user', 'session', 'color', 'order'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::with('product')->findOrFail($id);
        $colors = Color::get();
        return view('product', compact('category', 'colors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
