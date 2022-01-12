<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subcategory as RequestsSubcategory;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::FindOrFail($id);
        return view('subcategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsSubcategory $request)
    {
        $validation = $request->validated();
        $validation['category_id'] = $request['category_id'];
        Subcategory::create($validation);

        session()->flash('subcategory', 'Subcategory has been Created!');
        return redirect()->route('subcategory.show',$request->category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $subcategory)
    {
        $category = $subcategory::with('subcategory')->find($subcategory->id);
        $key = 1;
        return view('subcategory.dashboard', compact('category','key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        return view('subcategory.update', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsSubcategory $request, Subcategory $subcategory)
    {
        $validation = $request->validated();
        $subcategory->fill($validation);
        $subcategory->save();

        session()->flash('subcategory', 'Subcategory has been Updated!');
        return redirect()->route('subcategory.show',$subcategory->category_id);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->subcat_id);
        $subcategory->delete();
        session()->flash('subcategory', 'Subcategory has been Deleted!');
        return redirect()->route('subcategory.show',$subcategory->category_id);  
    }
}
