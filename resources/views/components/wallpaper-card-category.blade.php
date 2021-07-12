@if ($category = $wallpaper->hasCategory())
    <a href="{{ route('wallpapers.category', $category) }}">
        {{ $category->name }}
    </a>
@else
    Нет категории
@endif
