@extends('layouts.app')

@section('content')
    <x-banner size="is-medium" status="is-primary">
        Самые минималистичные и элегантные обои для вашего рабочего стола!
        <x-slot name="subtitle">Настроение и вдохновение в одном кадре. {{ $wallpapersCount }} обоев.</x-slot>
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
