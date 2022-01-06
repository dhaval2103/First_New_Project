<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productvalidation extends FormRequest
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
        $id = $this->id;
        if ($id) {
            return [
                'watchbrand' => 'required',
                'title' => 'required|unique:products,title,' . $id,
                'description' => 'required',
                'price' => 'required',
                // 'image' => 'max:1',
            ];
        } else {
            return [
                'watchbrand' => 'required',
                'title' => 'required|unique:products,title',
                'description' => 'required',
                'image' => 'required',
                'price' => 'required',
            ];
        }
    }
    public function messages()
    {
        return [
            'title.required' => 'Please Enter Title',
            'description.required' => 'Please Enter Description',
            'price.required' => 'Please Enter Price',
            'image.required' => 'Please Choose Image',
        ];
    }
}