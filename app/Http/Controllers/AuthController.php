<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function signUp(){
        return view('auth.singn-up');
    }


    public function signIn(SignInFormRequest $request){

        if(!auth()->attempt($request->validated())){
            return back()->withErrors([
                'email' => 'Ошибка какая-то'
            ])->onlyInput('email');
        }


        $request->session()->regenerate();
        return redirect()->intended(route('home'));


    }


}
