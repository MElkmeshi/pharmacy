<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'unKnown page')</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="/images/about-medicine.png">
    <!-- css styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/homepage.css" />



    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>

   
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
                        @foreach ($menuItems as $menuItem)
                            <li class="nav-item">
                                @if ($menuItem->children->isEmpty())
                                    <a class="nav-link p-2 p-lg-3" href="{{ $menuItem->url }}">{{ $menuItem->name }}</a>
                                @else
                                    <div class="dropdown">
                                        <a class="nav-link p-2 p-lg-3 dropdown-toggle" href="#" role="button"
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $menuItem->name }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($menuItem->children as $child)
                                                <li><a class="dropdown-item" href="{{ $child->url }}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                   
    
                    @if (session()->has('user_name'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-2 p-lg-3" href="#" id="basic-nav-dropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                                {{ session('user_name') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="basic-nav-dropdown">
                                @if (strtolower(session('user_role')) == 'admin')
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('updateuserform', ['id' => session('user_id')]) }}">Admin
                                            Profile</a>
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
                                        <a class="dropdown-item" href="{{ route('displayorders') }}">My Orders</a>
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
                    <a href="{{ route("produser") }}"> <i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="{{ route('displaycart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @section('content')
        {{-- override this function in all pages to show the content of the pages --}}
        show your content
    @endsection

    @include('layout.footer')
</body>

</html>
