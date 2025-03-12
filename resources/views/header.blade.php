<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EduNeuroHRx</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Owl Slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Font Awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>
<body>
    
    <div class="hero_area">
        <!-- Header section starts -->
        <header class="header_section">
          <div class="header_top">
            <div class="container-fluid">
              <div class="contact_nav">
                <a href="tel:+919979166500">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span> Call : +91 9979166500 </span>
                </a>
                <a href="mailto:eduneurohrx@gmail.com">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span> Email : eduneurohrx@gmail.com </span>
                </a>
                <a href="https://www.google.com/maps/place/Shukan+Mall">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span> Location </span>
                </a>
              </div>
            </div>
          </div>
          <div class="header_bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{ route('admin.login') }}">
                  <span> EduNeuroHRx </span>
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                  <span class=""> </span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('jobs.list') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    
                    @auth
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                          <i class="fa fa-user" aria-hidden="true"></i> Dashboard
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                        </a>
                      </li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                          <i class="fa fa-user" aria-hidden="true"></i> Login/Register
                        </a>
                      </li>
                    @endauth
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </header>
        <!-- End header section -->
</body>
</html>