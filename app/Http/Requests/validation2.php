<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validation2 extends FormRequest
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
            'name1'=>'required|alpha|min:3',
            'email1'=>'required|email',
            'country1'=>'required',
            'state1'=>'required',
            'city1'=>'required',
            'address1'=>'required',
            'hobby1'=>'required',
        ];
    }
}
