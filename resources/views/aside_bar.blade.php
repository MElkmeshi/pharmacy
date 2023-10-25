<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/asidebar.css">
    <link rel="icon" type="image/x-icon" href="/images/about-medicine.png">
    @yield('name')


</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="containerr">
        <div class="navigation">
            <ul>
                <a href="/" style="text-decoration: none;color:black">
                    <li>
                        <span class="icon">
                            <img src="/images/logo.png" alt="logo" width="70px" />
                        </span>
                        <span class="title">Dr Mohamed</span>
                    </li>
                </a>

                <li>
                    <a href="{{ route('dash') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('addproduct') }}">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">Add product</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('disproduct') }}">
                        <span class="icon">
                            <ion-icon name="create-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dis_users') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>



                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <!-- insert here name of admin -->
                <div class="user">
                    <span class="title">Mohamed</span>
                </div>
            </div>
            {{-- add here the main of pages --}}
            @yield('card')
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script src="/js/dashboard.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
