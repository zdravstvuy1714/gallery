@extends('layouts.app')

@section('title', "Категория: {$category->name}")

@section('content')
    <x-banner status="is-primary">
        {{ $category->name }}
        <x-slot name="subtitle">Картинки по категориям</x-slot>
    </x-banner>

    <section class="section main-content">
        <div class="container">
            <div class="columns is-multiline">
                @forelse ($wallpapers as $wallpaper)
                    <x-wallpaper-card :wallpaper="$wallpaper"></x-wallpaper-card>
                @empty
                    На данный момент обоев нет.
                @endforelse
            </div>

            {{ $wallpapers->links() }}
        </div>
    </section>
@endsection
