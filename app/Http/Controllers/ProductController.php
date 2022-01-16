<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product as RequestsProduct;
use App\Models\Image;
use App\Models\Product;
use App\Rules\UploadCountLess;
use App\Rules\UploadCountMore;
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
    public function store(Request $request)
    {
        $validation = $request->validate([
            'product' => 'required|min:5|max:50',
            'category_id' => 'required',
            'subcategory_id' => 'required|required_if:category_id,1',
            'thumbnail' => 'required|max:2048|mimes:png,jpg,jpeg|dimensions:max_height:500,max_width:1000|image',
            'description' => 'required|min:10|max:1000',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stock' => 'required|numeric',
            'color' => 'required|min:2|max:20',
            'image' => ['required', new UploadCountLess, new UploadCountMore],
            'highlight' => 'required|min:5',
            'specifications' => 'required|min:5',
        ]);
        
        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('Thubnail');
        }
        
        $product = new Product();
        $product->product = $request->product;
        $product->category_id  = $request->category_id ;
        $product->subcategory_id  = $request->subcategory_id ;
        $product->thumbnail = $path;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->color = $request->color;
        $product->highlight = $request->highlight;
        $product->specifications = $request->specifications;
        $product->save();


        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->store('image');
                $images[] = $name;
                Image::insert( ['image'=> $name, 'product_id' => $product->id, 'category_id' => $product->category_id, 'subcategory_id' => $product->subcategory_id]);
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
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->pro_id);
        if ($product->thumbnail) {
            Storage::delete($product->thumbnail);
        }
        
        $product->delete();

        session()->flash('product', 'Product has been Deleted!');
        return redirect()->route('product.index');
    }
}
