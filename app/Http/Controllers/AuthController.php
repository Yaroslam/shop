<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordFormRequest;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function signUp(){
        return view('auth.sign-up');
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

    public function signUpPost(SignUpFormRequest $request){

        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        event(new Registered($user));
        auth()->login($user);

        $request->session()->regenerate();
        return redirect()->intended(route('home'));


    }

    public function logOut(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function forgot(){
        return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordFormRequest $request){
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT ? back()->with(['message' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


}
