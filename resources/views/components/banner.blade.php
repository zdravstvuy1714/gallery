<section class="hero {{ $size ?? '' }} {{ $status ?? '' }} is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                {{ $slot }}
            </h1>
            <h2 class="subtitle">
                {{ $subtitle }}
            </h2>
        </div>
    </div>
</section>
