<a
    href="{{ $wallpaper->hasImage() ? $wallpaper->getImage() : '#' }}"
    class="button is-info is-pulled-right"
    {{ $wallpaper->hasImage() ? '' : 'disabled' }}
    {{ $wallpaper->hasImage() ? 'download' : '' }}>
    Скачать
</a>
