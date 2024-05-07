<header>
    <nav class="navbar navbar-expand-lg headerNav">
        <div class="container">
            <a class="navbar-brand" href="{{ Auth::check() ? route('admin.dashboard') : route('home') }}"><img
                    src="{{ asset('assets/') . '/boolivery_manager.svg' }}" alt="" height="50px"></a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.dashboard') ? 'active' : '' }} {{ str_contains(Route::currentRouteName(), 'home') ? 'active' : '' }}"
                            aria-current="page"
                            href="{{ Auth::check() ? route('admin.dashboard') : route('home') }}">Home</a>
                    </li>
                    @auth

                        <li class="nav-item">
                            <a class='nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.restaurants') ? 'active' : '' }}'
                                href="{{ route('admin.restaurants.index') }}">Restaurants</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.dishes') ? 'active' : '' }}"
                                href="{{ route('admin.dishes.index') }}">Dishes</a>

                            <!-- <a class="nav-link" @class(['active' => Route::currentRouteName() == 'dishes']) href="{{ route('admin.dishes.index') }}">Dishes</a> -->
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Types</a>
                        </li> -->



                    @endauth
                </ul>


                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown ">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle text-white"
                                data-bs-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-item"><a href="{{ route('admin.dashboard') }}"> Dashboard</a></div>
                                <div class="dropdown-item"><a href="{{ url('profile') }}"> Profile</a></div>
                                <div class="dropdown-item"><a href="{{ route('logout') }}" id="logout-link">
                                        Logout
                                    </a></div>

                                <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
