@extends('layouts.auth')
@section('content')
    <x-forms.auth-forms title="Вход в аккаунт" action="" method="POST">
        @csrf
        <x-forms.text-input :is-error="$errors->has('email')" type="email" placeholder="E-mail" required="true"></x-forms.text-input>

        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror


        <x-forms.primary-button> Войти </x-forms.primary-button>


        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs"><a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Вспомнил пароль</a></div>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection()
