 {{-- header --}}
    <header>
        <nav class="navbar navbar-light fixed-top">
            <div class="container-fluid">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand d-flex d-none d-lg-block" href="{{asset('/')}}"><img class=""src="{{asset('img/deliveroo-logo.png')}}" alt="deliveroo_logo"></a>
                    <a class="navbar-brand d-flex d-lg-none" href="{{asset('/')}}"><img class=""src="{{asset('img/deliveroo-md.png')}}" alt="deliveroo_logo"></a>
                    @if (Request::url() === route('restaurant.index'))
                    <input class="form-control me-2 nav-form" type="search" placeholder="Cerca il ristorante..." aria-label="Search" v-model="searchByName" v-on:keyup="goto('restaurants')">
                    @endif
                    <div class="nav_btn">
                        <!-- Authentication Links -->
                        @guest
                            <a class="btn-light btn" href="{{ route('login') }}">
                                <i class="fas fa-user"></i> &#32; Login
                            </a>
                        @if (Route::has('register'))
                            <a class="btn-light btn" href="{{ route('register') }}">
                                <i class="fas fa-sign-in-alt"></i> &#32; Sign in
                            </a>
                        @endif
                        @else
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                <span>Benvenuto {{ Auth::user()->name }}</span>
                                <a class="btn-light btn" href="{{ route('overview') }}">
                                    Dashboard
                                </a>
                                @csrf
                                <button type="submit" class="btn-light btn">Logout</button>
                            </form> 
                        @endguest
                    </div>
                    <div class="dropdown">
                        <div class="hamburger dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </div>
                            <div class="list-unstyled text-center dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu2">
                                <div class="d-flex justify-content-center align-items-center btn_dropdown">
                                    @guest
                                        <a class="btn-light btn" href="{{ route('login') }}">
                                            <i class="fas fa-user"></i> &#32; Login
                                        </a>
                                        @if (Route::has('register'))
                                        <a class="btn-light btn" href="{{ route('register') }}">
                                            <i class="fas fa-sign-in-alt"></i> &#32; Sign in
                                        </a>
                                        @endif
                                        @else
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            <a class="btn-light btn" href="{{ route('overview') }}">
                                                Dashboard
                                            </a>
                                            @csrf
                                            <button type="submit" class="btn-light btn">Logout</button>
                                        </form> 
                                    @endguest
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>