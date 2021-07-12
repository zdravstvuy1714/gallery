<div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <a href="{{ route('wallpapers.show', $wallpaper) }}">
                    <img src="{{ $wallpaper->getImage() }}" alt="Название: {{ $wallpaper->title }}">
                </a>
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
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
</div>
