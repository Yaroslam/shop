<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInFormRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->guest();
    }


    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required']
        ];
    }
}
