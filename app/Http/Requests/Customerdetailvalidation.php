<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Customerdetailvalidation extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'email.required' => 'Please Enter EmailID',
            'phone.required' => 'Please Enter Phoneno',
            'address.required' => 'Please Enter Address',
        ];
    }
}