@extends('layouts.app')

@section('title', 'Изменение обоев')

@section('content')
    <x-banner status="is-warning">
        Решили что-то поменять?
        <x-slot name="subtitle">Заполните форму и измените обои.</x-slot>
    </x-banner>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>

            <div class="column is-quarter auth-form">
                <form action="{{ route('wallpapers.update', $wallpaper) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    @if (session('success'))
                        <x-flash-notification status="is-success">
                            {{ session('success') }}
                        </x-flash-notification>
                    @endif

                    <div class="field">
                        <label class="label" for="title">Название</label>

                        <div class="control">
                            <input
                                class="input @error('title') is-danger @enderror"
                                type="text"
                                name="title"
                                id="title"
                                autofocus
                                value="{{ $wallpaper->title }}">
                        </div>

                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="description">Описание</label>

                        <div class="control">
                            <textarea
                                class="textarea @error('description') is-danger @enderror"
                                name="description"
                                id="description"
                            >{{ $wallpaper->description }}</textarea>
                        </div>

                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="category_id">Выберите категорию</label>

                        <div class="control">
                            <div class="select @error('category_id') is-danger @enderror">
                                <select name="category_id" id="category_id">
                                    <x-edit-wallpaper-category :currentCategory="$currentCategory"></x-edit-wallpaper-category>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @error('category_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="wallpaper">Выберите изображение</label>

                        <div class="file is-normal has-name">
                            <label class="file-label">
                                <input
                                    class="file-input"
                                    type="file"
                                    name="wallpaper"
                                    id="wallpaper">

                                <span class="file-cta">
                                    <span class="file-label">Выбрать</span>
                                </span>
                            </label>
                        </div>

                        @error('wallpaper')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field is-grouped">
                        <button class="button is-warning is-fullwidth" type="submit">Изменить</button>
                    </div>
                </form>
            </div>

            <div class="column"></div>
        </div>
    </div>
@endsection
