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
            'description' => 'required|min:10|max:1000',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stock' => 'required|numeric',
            'color' => 'required|min:2|max:20',
            'highlight' => 'required|min:5',
            'specifications' => 'required|min:5',
        ];
    }
}
