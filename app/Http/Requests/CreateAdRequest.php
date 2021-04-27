<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
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
            'title'=>'regex:/^[a-zA-Z0-9\s]+$/|min:2|max:20',
            'description'=>'min:10',
            'price'=>'numeric',
            'image'=>'required|max:5000|mimes:jpeg,bmp,png'
        ];
    }
}
