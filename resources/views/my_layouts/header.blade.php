 {{-- header --}}
    <header>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand d-flex" href="#"><img class=""src="{{asset('img/deliveroo-logo.png')}}" alt="deliveroo_logo"></a>
                    <input class="form-control me-2 nav-form" type="search" placeholder="Cerca il ristorante..." aria-label="Search">
                    <div class="nav_btn">
                        <a class="btn btn-light" href="#" role="button">
                            <i class="fas fa-user"></i>
                            Login
                        </a>
                        <a class="btn btn-light btn-price" href="#" role="button">
                            <i class="fas fa-sign-in-alt"></i>
                            Sign in
                        </a>
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