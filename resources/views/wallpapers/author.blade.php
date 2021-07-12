@extends('layouts.app')

@section('title', "Обои {$author->login}")

@section('content')
    <x-banner status="is-primary">
        Галерея пользователя {{ $author->login }}
        <x-slot name="subtitle">Загруженные обои</x-slot>
    </x-banner>

    <section class="section main-content">
        <div class="container">
            <div class="columns is-multiline">
                @forelse ($wallpapers as $wallpaper)
                    <div class="column is-one-quarter">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <a href="{{ route('wallpapers.show', $wallpaper) }}">
                                        <img src="{{ $wallpaper->getImage() }}" alt="{{ $wallpaper->title }}">
                                    </a>
                                </figure>
                            </div>
                            <div class="card-content">
                                @can('update', $wallpaper)
                                    <div class="media my-photo">
                                        <div class="media-left">
                                            <p class="title is-5">
                                                <a href="{{ route('wallpapers.edit', $wallpaper) }}" class="button is-warning">
                                                    Изменить
                                                </a>
                                                <a class="button is-danger" href="{{ route('wallpapers.destroy', $wallpaper) }}" onclick="event.preventDefault(); document.getElementById('delete-wallpaper-form').submit();">
                                                    Удалить
                                                </a>
                                            </p>
                                            <form id="delete-wallpaper-form" action="{{ route('wallpapers.destroy', $wallpaper) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                @endcan
                                <div class="media-content">
                                    <p class="is-size-7">
                                        Категория: <x-wallpaper-card-category :wallpaper="$wallpaper"></x-wallpaper-card-category>
                                    </p>
                                    <p class="is-size-7">Разрешение: {{ $wallpaper->resolution }}</p>
                                    <p class="is-size-7">Добавлено: {{ $wallpaper->getUploadDate() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    У автора пока что нет обоев.
                @endforelse
            </div>

            {{ $wallpapers->links() }}
        </div>
    </section>
@endsection
