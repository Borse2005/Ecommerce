<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes|required|numeric|digits:10',
            'alternatephone' => 'sometimes|required|required_unless:phone,10|digits:10|numeric',
            'address' => 'sometimes|required|min:10|max:150',
            'district' => 'sometimes|required|min:3|max:30',
            'state' => 'sometimes|required|min:3|max:30',
            'pincode' => 'sometimes|required|digits:6'
        ]; 
    }
}
