<!-- start of navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo.png" alt="logo" />

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-2 p-lg-3 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Medications</a></li>
                        <li><a class="dropdown-item" href="#">Skin Care</a></li>
                        <li><a class="dropdown-item" href="#">Baby Care</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Medical equipments</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Vitamins</a></li>
                        <li><a class="dropdown-item" href="#"> Supplements</a></li>
                        <li><a class="dropdown-item" href="#">Bills</a></li>
                        <li>
                            <a class="dropdown-item" href="#">antibiotique</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{ route('contact') }}"> contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{ route('about-us') }}"> About us</a>
                </li>

                @if (session()->has('user_name'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle p-2 p-lg-3" href="#" id="basic-nav-dropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                            {{ session('user_name') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="basic-nav-dropdown">
                            @if (session('user_role') == 'admin')
                                <li>
                                    {{-- <a class="dropdown-item" href="{{ route('updateuserform', ['id' => session('user_id')]) }}">Admin Profile</a> --}}
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('dash') }}">Admin Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('updateuserform') }}">User Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('displaycart') }}">Cart</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{-- route('displaycart') --}}">Order History</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    @else
                        <div class="m-3">
                            <a class="btn btn-primary rounded-bill main-btn" href="{{ route('loginform') }}">Login</a>
                        </div>
                        <div class="m-3"><a class="btn btn-primary rounded-bill main-btn"
                                href="{{ route('signupform') }}">SignUp</a>
                @endif
            </ul>
            <div class="icons ps-3 pe-3 d-none d-lg-block">
                <i class="fa-solid fa-magnifying-glass"></i>
                <a href="{{ route('displaycart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>
    </div>
</nav>

<!-- end of navbar -->
