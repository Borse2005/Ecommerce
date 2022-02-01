<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory as RequestsSubcategory;
use App\Http\Resources\Subcategory\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        $subcategory = Subcategory::with('category')->get();

        return SubcategoryResource::collection($subcategory);
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
        $subcategory = Subcategory::create($validation);

        return new SubcategoryResource($subcategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $subcategories = Subcategory::with('category')->findOrFail($subcategory->id);
        return new SubcategoryResource($subcategories);
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

        return new SubcategoryResource($subcategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return response()->json('Subcategory Deleted..');
    }
}
