@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <x-banner status="is-dark">
        Восстановление пароля.
        <x-slot name="subtitle">Введите новый пароль.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-quarter auth-form">
                @if ($errors->has('email') || session('danger'))
                    <x-flash-notification status="is-danger">
                        {{ $errors->first('email') ?? session('danger') }}
                    </x-flash-notification>
                @endif

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    <div class="field">
                        <label class="label" for="password">Новый пароль</label>

                        <div class="control">
                            <input
                                class="input @error('password') is-danger @enderror"
                                type="password"
                                name="password"
                                id="password"
                                autofocus>
                        </div>

                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-dark" type="submit">Восстановить пароль</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="column"></div>
        </div>
    </div>
@endsection
