@extends('layouts.app')

@section('title', $user->login)

@section('content')
    <x-banner status="is-info">
        Это вы!
        <x-slot name="subtitle">Информация о вашем профиле.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column">
                <x-profile-tabs></x-profile-tabs>

                <div class="is-clearfix"></div>

                <div class="columns is-centered">
                    <div class="column is-half">
                        @if (session('success'))
                            <x-flash-notification status="is-success">
                                {{ session('success') }}
                            </x-flash-notification>
                        @endif

                        <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="field">
                                <label class="label" for="avatar">Выберите аватар</label>

                                <div class="file is-normal has-name">
                                    <label class="file-label">
                                        <input
                                            class="file-input"
                                            type="file"
                                            name="avatar"
                                            id="avatar">

                                        <span class="file-cta">
                                            <span class="file-label">Выбрать</span>
                                        </span>
                                    </label>
                                </div>

                                @error('avatar')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label" for="login">Логин</label>

                                <div class="control">
                                    <input
                                        class="input @error('login') is-danger @enderror"
                                        type="text"
                                        name="login"
                                        id="login"
                                        autofocus
                                        value="{{ $user->login }}">
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
                                        value="{{ $user->email }}">
                                </div>

                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="control">
                                <button class="button is-info" type="submit">Обновить информацию</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
