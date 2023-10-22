<!-- start of navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand"  href="#">
        <img src="images/logo.png" alt="logo" />
        
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#main"
        aria-controls="main"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="main">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="home.blade.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link p-2 p-lg-3 dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              products
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Medications</a></li>
              <li><a class="dropdown-item" href="#">Skin Care</a></li>
              <li><a class="dropdown-item" href="#">Baby Care</a></li>
              <li>
                <a class="dropdown-item" href="#">Medical equipments</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Vitamins</a></li>
              <li><a class="dropdown-item" href="#"> Supplements</a></li>
              <li><a class="dropdown-item" href="#">Bills</a></li>
              <li>
                <a class="dropdown-item" href="#">antibiotique</a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link p-2 p-lg-3" href="contact.blade.php"> contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link p-2 p-lg-3" href="about-us.blade.php"> About us</a>
          </li>
        </ul>
        <div class="icons ps-3 pe-3 d-none d-lg-block">
          <i class="fa-solid fa-magnifying-glass"></i>
          <i class="fa-solid fa-cart-shopping"></i>
          <i class="fa-regular fa-heart"></i>
        </div>
        <div class="m-3">
          <a class="btn btn-primary rounded-bill main-btn" href="#">Login</a>
        </div>
        
        <div class="m-1"><a class="btn btn-primary rounded-bill main-btn" href="#">SignUp</a></div>
      </div>
    </div>
  </nav>

  <!-- end of navbar -->