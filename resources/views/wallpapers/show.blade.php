@extends('layouts.app')

@section('title', $wallpaper->title)

@section('content')
    <x-banner size="is-medium" status="is-info">
        {{ $wallpaper->title }}
        <x-slot name="subtitle">{{ $wallpaper->description }}</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-half auth-form">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ $wallpaper->getImage() }}" alt="Название: {{ $wallpaper->title }}">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="{{ $wallpaper->author->getAvatar() }}" alt="{{ $wallpaper->author->login }}'s avatar">
                                </figure>
                            </div>
                            <p class="title is-4">
                                Добавил: <a href="{{ route('wallpapers.author', $wallpaper->author) }}">
                                    {{ $wallpaper->author->login }}
                                </a>
                            </p>
                        </div>

                        <div class="content">
                            {{ $wallpaper->description }}
                            <br>
                            <p class="is-size-7">Разрешение: {{ $wallpaper->resolution }}</p>
                            <p class="is-size-7 is-pulled-left">Добавлено: {{ $wallpaper->getUploadDate() }}</p>
                            <br>
                            <x-download-wallpaper-button :wallpaper="$wallpaper"></x-download-wallpaper-button>
                            <div class="is-clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="column"></div>
        </div>

        <x-more-author-wallpapers :wallpaper="$wallpaper"></x-more-author-wallpapers>
    </div>
@endsection
