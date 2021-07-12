<div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <a href="{{ route('wallpapers.category', $category) }}">
                    <img src="{{ $category->getCover() }}" alt="Название: {{ $category->name }}">
                </a>
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <a class="is-size-5" href="{{ route('wallpapers.category', $category) }}">
                        Категория: {{ $category->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
