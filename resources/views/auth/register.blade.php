@extends('layouts.app')

@section('title', 'Создание аккаунта')

@section('content')
    <x-banner status="is-primary">
        Добро пожаловать в наше сообщество!
        <x-slot name="subtitle">Создание аккаунта.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-quarter auth-form">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label class="label" for="login">Логин</label>

                        <div class="control">
                            <input
                                class="input @error('login') is-danger @enderror"
                                type="text"
                                name="login"
                                id="login"
                                autofocus
                                value="{{ old('login') }}">
                        </div>

                        @error('login')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="email">Email</label>

                        <div class="control">
                            <input
                                class="input @error('email') is-danger @enderror"
                                type="text"
                                name="email"
                                id="email"
                                value="{{ old('email') }}">
                        </div>

                        @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="password">Пароль</label>

                        <div class="control">
                            <input
                                class="input @error('password') is-danger @enderror"
                                type="password"
                                name="password"
                                id="password">
                        </div>

                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input
                                    type="checkbox"
                                    name="accepting_rules"
                                    {{ old('accepting_rules') ? 'checked' : '' }}>
                                Я согласен с <a href="{{ route('rules') }}">правилами сайта</a>
                            </label>

                            @error('accepting_rules')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-primary" type="submit">Создать аккаунт</button>
                        </div>

                        <div class="control">
                            <a class="button is-text" href="{{ route('home') }}">Отмена</a>
                        </div>
                    </div>

                    <div class="field">
                        <p>Уже зарегистрированы? <b><a href="{{ route('login') }}">Войти</a></b></p>
                    </div>
                </form>
            </div>

            <div class="column"></div>
        </div>
    </div>
@endsection
