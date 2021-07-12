@extends('layouts.app')

@section('title', "Все категории")

@section('content')
    <x-banner status="is-primary">
        Разнообразное множество категорий
        <x-slot name="subtitle">Все категории</x-slot>
    </x-banner>

    <section class="section main-content">
        <div class="container">
            <div class="columns is-multiline">
                @forelse ($categories as $category)
                    <x-category-card :category="$category"></x-category-card>
                @empty
                    Категорий нет.
                @endforelse
            </div>

            {{ $categories->links() }}
        </div>
    </section>
@endsection
