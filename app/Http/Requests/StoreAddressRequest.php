<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'address' => 'required|string|min:5|max:50',
            'city' => 'required|string|min:3|max:30',
            'district' => 'required|string|min:3|max:30',
            'state' => 'required|string|min:3|max:30',
            'phone' => 'required|integer|digits:10',
            'alternate_phone' => 'required|integer|different:phone|digits:10',
            'pincode' => 'required|integer|digits:6',
            'user_id' => 'required|integer',
        ];
    }
}
