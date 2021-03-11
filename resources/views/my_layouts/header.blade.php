 {{-- header --}}
    <header>
        <nav class="navbar navbar-light fixed-top">
            <div class="container-fluid">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand d-flex" href="{{asset('/')}}"><img class=""src="{{asset('img/deliveroo-logo.png')}}" alt="deliveroo_logo"></a>
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
                    <div class="hamburger">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid menu justify-content-center d-none">
            <ul class="list-unstyled text-center">
                <li><input class="form-control me-2 menu-form" type="search" placeholder="Cerca il ristorante..." aria-label="Search"></li>
                <li><a href="#"><i class="fas fa-sign-in-alt"></i> &#32; Sign in</a></li>
                <li><a href="#"><i class="fas fa-user"></i> &#32; Login</a></li>
            </ul>
        </div>
    </header>