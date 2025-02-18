<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <!-- Logo a sinistra -->
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="/media/gran_bazar.png" alt="logo gran bazar" class="logo-navbar">
        </a>


        <!-- Barra di ricerca centrata -->
        <form class="d-flex mx-auto search-bar" role="search" style="max-width: 400px; flex-grow: 1;"
            action="{{ route('article.search') }}" method="GET">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit" id="basic-addon2">Search</button>
        </form>

        <!-- Bottone di toggle per mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu a tendina -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto text-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('article.index') }}">{{ __('ui.allTheAds') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('create.article') }}">{{ __('ui.sellNow') }}</a>
                </li>
                @if (Auth::check() && !Auth::user()->is_revisor)
                    <a class="nav-link" href="{{ route('become.revisor') }}">{{ __('ui.becomeRevisor') }}</a>
                @endif
                {{-- zona revisore --}}
                @if (Auth::check() && Auth::user()->is_revisor)
                    <li>
                        <a class="nav-link  position-relative w-sm-25" href="{{ route('revisor.index') }}">
                            {{ __('ui.revisorZone') }}
                            @if ($articlesToReviewCount > 0)
                                <span class="position-absolute top-0  translate-middle badge rounded-pill bg-danger">
                                    {{ $articlesToReviewCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @forelse($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', compact('category')) }}">
                                    {{ __("ui.$category->name") }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @empty
                            <li>
                                {{ __('ui.noCategoriesFound') }}
                            </li>
                        @endforelse
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            {{ __('ui.hi') }}, {{ Auth::user()->name }}
                        @else
                            {{ __('ui.authentication') }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('register') }}">Sign in</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endguest

                        @auth


                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle bg-light" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-earth-europe world fs-4"></i> <span class="world fs-8">LG</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/lang/it">
                                <x-_locale lang="it" />
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/lang/en">
                                <x-_locale lang="en" />
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/lang/es">
                                <x-_locale lang="es" />
                            </a>
                        </li>
                    </ul>
                </div>

</nav>
