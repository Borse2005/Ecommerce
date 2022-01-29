<?php

namespace App\Http\Controllers;

use App\Events\AdminOrderEvent;
use App\Events\OrderPlacedEvent;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\DeliveryStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = 1;
        $order = Order::all();
        $status = DeliveryStatus::all();
        return view('order.index', compact('key', 'order', 'status'));
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        
      $cart = Cart::find($request->cart_id);
        foreach ($cart as $key => $value) {
            Order::create([
                'address_id' => $request->address_id,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'payment_status' => $request->payment_status,
                'user_id' => Auth::user()->id,
            ]);
        }

        foreach ($cart as $key => $value) {
            $value->delete();
        }
        $user = User::all();
        foreach ($user as $key => $value) {
            if ($value->role_id == 2) {
                event(new AdminOrderEvent($value));
            }
        }
        event(new OrderPlacedEvent(Auth::user()));
        session()->flash('order', "Order Palced...");
        return redirect()->route('dash.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $status = DeliveryStatus::all();
        return view('order.details', compact('order', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $validation = $request->validated();
        $order->fill($validation);
        $order->save();

        session()->flash('order', 'Order updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
