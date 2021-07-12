@extends('layouts.app')

@section('title', 'Безопасность профиля')

@section('content')
    <x-banner status="is-info">
        Безопасность превыше всего!
        <x-slot name="subtitle">Вы можете сменить свой пароль.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column">
                <x-profile-tabs></x-profile-tabs>

                <div class="is-clearfix"></div>

                <div class="columns is-centered">
                    <div class="column is-half">
                        @if (session('success') || session('error'))
                            <x-flash-notification status="{{ session('success') ? 'is-success' : 'is-danger' }}">
                                {{ session('success') ?? session('error') }}
                            </x-flash-notification>
                        @endif

                        <form action="{{ route('profile.security') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="field">
                                <label class="label" for="current_password">Текущий пароль</label>

                                <div class="control">
                                    <input
                                        class="input @error('current_password') is-danger @enderror"
                                        type="password"
                                        name="current_password"
                                        id="current_password"
                                        autofocus>
                                </div>

                                @error('current_password')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label" for="password">Новый пароль</label>

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

                            <div class="control">
                                <button class="button is-info" type="submit">Сменить пароль</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
