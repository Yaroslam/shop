@extends('layouts.auth')
@section('content')
    <x-forms.auth-forms title="Восстанволение пароля" action="" method="POST">
        @csrf
        <x-forms.text-input :is-error="$errors->has('email')" type="email" placeholder="E-mail" required="true"></x-forms.text-input>

        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror


        <x-forms.text-input :is-error="$errors->has('password')" name="password" type="password" placeholder="Пароль" required="true"></x-forms.text-input>

        @error('password')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input :is-error="$errors->has('password_confirmation')" name="password_confirmation" type="password" placeholder="Повторите Пароль" required="true"></x-forms.text-input>

        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror


        <x-forms.primary-button> Обновить пароль </x-forms.primary-button>


        <x-slot:buttons>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection()
