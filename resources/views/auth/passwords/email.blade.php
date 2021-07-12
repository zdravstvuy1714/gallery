@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <x-banner status="is-dark">
        Восстановление пароля.
        <x-slot name="subtitle">Письмо для восстановления пароля придет вам на почту.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-quarter auth-form">
                @if (session('info'))
                    <x-flash-notification status="is-info">
                        {{ session('info') }}
                    </x-flash-notification>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input
                                class="input @error('email') is-danger @enderror"
                                type="email"
                                name="email"
                                id="email"
                                autofocus
                                value="{{ old('email') }}">

                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-dark">Отправить письмо</button>
                        </div>

                        <div class="control">
                            <a class="button is-text" href="{{ route('home') }}">Отмена</a>
                        </div>
                    </div>

                    <div class="field">
                        <p>Нет аккаунта? <b><a href="{{ route('register') }}">Создать аккаунт</a></b></p>
                    </div>
                </form>
            </div>

            <div class="column"></div>
        </div>
    </div>
@endsection
