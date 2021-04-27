<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'firstname'=>'alpha_num|min:2|max:20',
            'lastname'=>'alpha_num|min:2|max:20',
            'email'=>'email',
            'password'=>'required|min:6',
            'confirm-password'=>'required|min:6|same:password'
        ];
    }
}
