<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Session;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
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
        $category = Cache::remember('category', now()->minute(10), function () {
            return Category::all();
        });
        $product = Cache::remember('product', now()->minutes(10), function () {
            return Product::take(4)->get();
        });
        $user = Cache::remember('user', now()->minutes(10), function () {
            return User::get();
        });
        $session = Cache::remember('session', now()->minutes(10), function () {
            return Session::all();
        });
        $color = Cache::remember('color', now()->minutes(10), function () {
            return Color::all();
        });
        $order = Cache::remember('order', now()->minute(10), function () {
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
        if ($request->low) {

            $category = Category::with(['product' => function ($query) {
                $query->orderBy('price', 'asc')->get();
            }], 'subcategory')->findOrFail($id);
            $key = $request->low;
            $cat = null;

        } elseif ($request->high) {

            $category = Category::with(['product' => function ($query) {
                $query->orderBy('price', 'desc')->get();
            }], 'subcategory')->findOrFail($id);
            $key = $request->high;
            $cat = null;

        } elseif ($request->category) {

                $category = Category::with(['product' => function ($query) use ($request) {
                    $query->where('subcategory_id', '=', $request->category)->get();
                }], 'subcategory')->findOrFail($id);
            $cat = $request->category;
            $key = null;

        } else {

            $category = Category::with('product', 'subcategory')->findOrFail($id);
            $key = null;
            $cat = null;
        }

        $colors = Color::get();
        return view('product', compact('category', 'colors', 'key', 'cat'));
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
        $order = Order::with('product')->FindOrFail($id);
        if($request->has('download')){  
            $pdf = PDF::loadView('pdf.index', compact('order'));  
            return $pdf->download('pdfview.pdf');  
        }  

        return redirect()->route('order.show', $id);  
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
