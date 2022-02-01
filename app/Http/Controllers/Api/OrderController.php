<?php

namespace App\Http\Controllers\Api;

use App\Events\AdminOrderEvent;
use App\Events\OrderPlacedEvent;
use App\Events\OutOfStockEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Cart;
use App\Models\DeliveryStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        $status = DeliveryStatus::all();
        return OrderResource::collection($order, $status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $user = User::all();
        $stock = 0;
        $cart = Cart::findOrFail($request->cart_id);
        foreach ($cart as $value) {
            $order[] = Order::create([
                'address_id' => $request->address_id,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'payment_status' => $request->payment_status,
                'user_id' => Auth::user()->id,
            ]);
            $product = Product::findOrFail($value->product_id);
            $product->stock = $product->stock - $value->qty;
            $product->save();

            if ($product->stock == 0) {
                $stock = $product->id;
            }
        }

        if ($stock != 0) {
            $producted = Product::findOrFail($stock);
            foreach ($user as $users) {
                if ($users->role_id == 2) {
                    event(new OutOfStockEvent($users, $producted));
                }
            }
        }

        foreach ($cart as $key => $value) {
            $value->delete();
        }

        foreach ($user as $key => $value) {
            if ($value->role_id == 2) {
                event(new AdminOrderEvent($value));
            }
        }

        event(new OrderPlacedEvent(Auth::user()));
        session()->flash('order', "Order Palced...");
        return OrderResource::collection($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return new OrderResource($order);
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
