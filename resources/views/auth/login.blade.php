@extends('layouts.app')

@section('title', 'Вход в аккаунт')

@section('content')
    <x-banner status="is-info">
        Поделитесь красочными снимками!
        <x-slot name="subtitle">Вход в аккаунт.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-quarter auth-form">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label class="label" for="username">Логин или email</label>

                        <div class="control">
                            <input
                                class="input @error('username') is-danger @enderror"
                                type="text"
                                name="username"
                                id="username"
                                autofocus
                                value="{{ old('username') }}">
                        </div>

                        @error('login')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="password">Пароль</label>
                        <div class="control">
                            <input
                                class="input"
                                type="password"
                                name="password"
                                id="password">

                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-info" type="submit">Войти</button>
                        </div>

                        <div class="control">
                            <a class="button is-text" href="{{ route('home') }}">Отмена</a>
                        </div>
                    </div>

                    <div class="field">
                        <p>Забыли пароль? <b><a href="{{ route('password.request') }}">Восстановление пароля</a></b></p>
                    </div>
                </form>
            </div>

            <div class="column"></div>
        </div>
    </div>
@endsection
