<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product' => 'required|min:5|max:50',
            'category_id' => 'required',
            'subcategory_id' => 'required|required_if:category_id,1',
            'thumbnail' => 'required|image|max:1024|dimensions:min_width=50,min_height=50|mimes:png,jpg',
            'description' => 'required|min:10|max:1000',
            'brand' => 'required|min:3|max:30',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stock' => 'required|numeric',
            'color' => 'required|min:2|max:20',
            'ram' => 'required',
            'rom' => 'required',
            'size' => 'required|max:50|numeric',
            'battery' => 'required',
            'processor' => 'required|string|min:5|max:30',
            // 'image[]' => 'required|image|dimensions:min_width=50,min_height=50|mimes:png,jpg',
        ];
    }
}
