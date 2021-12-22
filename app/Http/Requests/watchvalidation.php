<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class watchvalidation extends FormRequest
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
        if ($id == "") {
            return [
                'name' => 'required',
            ];
        } else {
            return [
                'name' => 'required' . $id,
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Watch-Brand',
        ];
    }
}
