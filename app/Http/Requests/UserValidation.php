<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
           'name'=>'required|min:3|regex:/^[\pL\S\-]+$/U',
           'email'=>'required|email|unique:Customer,email',
           'pass'=>'required|min:7|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'name is required',
            'name.min'=>'name must be more than 3 character',
            'name.regex'=>'name only support string character',
            'email.required'=>'email is required',
            'email.email'=>'invalid email address',
            'email.unique'=>'email must be unique',
            'pass.required'=>'password is required',
            'pass.min'=>'password must not be less than seven chracter',
            'pass.regex'=>'password must contant alpbahet,number,special character',

        ];
    }
}
