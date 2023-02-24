<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpFormRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->guest();
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'unique:users' ],
            'password' => ['required', 'confirmed', Password::defaults()]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => str(request('email'))->squish()->value()
        ]);
    }

}
