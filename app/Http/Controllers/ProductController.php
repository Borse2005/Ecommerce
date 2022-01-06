<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product as RequestsProduct;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->get();
        $key = 1;
        return view('product.dashboard', compact('product', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsProduct $request)
    {
        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('Thubnail');
        }
        
        $validation = $request->validated();
        $validation['thumbnail'] = $path;
        // $validation['image'] = json_encode($data);
        $product = Product::create($validation);

        if ($request->hasFile('image')) {
            foreach ($request->File('image') as $file) {
                $name = $file->store('image');
                $images[]=$name;
                Image::insert( ['image'=> $name, 'product_id' => $product->id]);
            }
        }

        session()->flash('product', 'Product has been added!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::with('category', 'subcategory', 'image')->findOrFail($product->id);
        return view('product.details', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::with('category', 'subcategory')->findOrFail($product->id);
        return view('product.update', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsProduct $request, Product $product)
    {
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('Thubnail');
            if ($product->thumbnail) {
                Storage::delete($product->thumbnail);
            }
        }

        $validation = $request->validated();
        $product->fill($validation);
        $product->save();

        session()->flash('product', 'Product has been Updated!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->thumbnail) {
            Storage::delete($product->thumbnail);
        }
        
        $product->delete();

        session()->flash('product', 'Product has been Deleted!');
        return redirect()->route('product.index');
    }
}
