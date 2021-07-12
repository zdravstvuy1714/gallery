<nav class="navbar is-transparent">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.svg') }}" width="32" style='margin-right: 10px;'>
            <h1 class="is-uppercase has-text-weight-bold has-text-info">{{ config('app.name') }}</h1>
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item {{ navbar_active_link('home') }}" href="{{ route('home') }}">
                Главная
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="{{ route('categories.index') }}">
                    Категории
                </a>
                <div class="navbar-dropdown is-boxed">
                    @forelse ($categories as $category)
                        <a class="navbar-item" href="{{ route('wallpapers.category', $category) }}">
                            {{ limit_str($category->name, 16) }}
                        </a>
                    @empty
                        <p class="navbar-item">Категорий нет</p>
                    @endforelse
                </div>
            </div>
            @auth
                <a class="navbar-item {{ navbar_active_link('wallpapers.author', Request::is('wallpapers/author/' . current_user('login')) == current_user('login')) }}" href="{{ route('wallpapers.author', current_user()) }}">
                    Моя галерея
                </a>
            @endauth
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    @guest
                    <p class="control">
                        <a class="button is-primary" href="{{ route('register') }}">
                            <span class="icon">
                                <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                                </svg>
                            </span>
                            <strong>Создать аккаунт</strong>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-info" href="{{ route('login') }}">
                            <span class="icon">
                                <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            </span>
                            <span>Вход в аккаунт</span>
                        </a>
                    </p>
                    @else
                        <p class="control">
                            <a class="button is-primary" href="{{ route('wallpapers.create') }}">
                                <strong>+ Добавить обои</strong>
                            </a>
                        </p>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">
                                {{ limit_str(current_user('login'), 16) }}
                            </a>
                            <div class="navbar-dropdown is-boxed">
                                <a class="navbar-item" href="{{ route('profile') }}">
                                    <span class="icon">
                                        <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    <span>Профиль</span>
                                </a>
                                <a class="navbar-item" href="{{ route('profile.security') }}">
                                    <span class="icon">
                                        <svg class="bi bi-gear-wide" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 0 0-9.995 4.998 4.998 0 0 0 0 9.996z"/>
                                        </svg>
                                    </span>
                                    <span>Безопасность</span>
                                </a>
                                <a class="navbar-item" href="{{ route('wallpapers.author', current_user()) }}">
                                    <span class="icon">
                                        <svg class="bi bi-collection" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                        </svg>
                                    </span>
                                    <span>Моя галерея</span>
                                </a>
                                <a class="navbar-item has-text-success" href="{{ route('wallpapers.create') }}">
                                    <span class="icon">+</span>
                                    <strong>Добавить обои</strong>
                                </a>
                                <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="icon"></span>
                                    <span>Выйти</span>
                                </a>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
