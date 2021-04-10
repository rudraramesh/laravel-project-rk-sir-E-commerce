<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'address' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|numeric',
            'dob' => 'required',
            'image' => 'required|image'
        ];
    }

    public function updatemessage()
    {
        return[
            'address.required' => 'address is required',
            'address.min' => 'must not be less than three letters',
            'address.regex' => 'must contain alphabets',
            'phone.required' => 'must have phone number',
            'phone.numeric' => 'must be numbers',
            'dob.required' => 'dob is required',
            'dob.date_format' => 'must have Y-M-D format',
            'image.required' => 'image is needed',
            'image.image'=> 'must be only image file'


        ];
    }
}
