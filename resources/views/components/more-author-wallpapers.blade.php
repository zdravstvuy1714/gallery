@if ($wallpaper->author->hasMoreWallpapersThen(1))
    <hr>

    <div class="columns">
        <div class="column">
            <h1 class="title">Другие фотографии от <a href="{{ route('wallpapers.author', $wallpaper->author) }}">{{ $wallpaper->author->login }}</a></h1>
        </div>
    </div>

    <div class="columns section">
        @foreach ($wallpaper->author->getMoreWallpapers(4) as $wallpaper)
            <x-wallpaper-card :wallpaper="$wallpaper"></x-wallpaper-card>
        @endforeach
    </div>
@endif

