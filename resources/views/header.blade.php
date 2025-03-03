<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EduNeuroHRx</title> -->

  <!-- bootstrap core css -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->

  <!-- fonts style -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> -->

  <!--owl slider stylesheet -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> -->

  <!-- font awesome style -->
  <!-- <link href="css/font-awesome.min.css" rel="stylesheet" /> -->

  <!-- Custom styles for this template -->
  <!-- <link href="css/style.css" rel="stylesheet" /> -->
  <!-- responsive style -->
  <!-- <link href="css/responsive.css" rel="stylesheet" />

</head>
<body> -->
    
    <!-- <div class="hero_area"> -->
        <!-- header section strats -->
        <!-- <header class="header_section">
          <div class="header_top">
            <div class="container-fluid ">
              <div class="contact_nav">
                <a href="tel:+919979166500">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    Call : +91 9979166500
                  </span>
                </a>
                <a href="mailto:eduneurohrx@gmail.com">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span>
                    Email : eduneurohrx@gmail.com
                  </span>
                </a>
                <a href="https://www.google.com/maps/place/Shukan+Mall/@23.0716244,72.516331,21z/data=!4m14!1m7!3m6!1s0x395e9d004c769aa1:0x65a5ca569feb4220!2sShukan+Mall!8m2!3d23.0715507!4d72.5165513!16s%2Fg%2F11w8jfsb93!3m5!1s0x395e9d004c769aa1:0x65a5ca569feb4220!8m2!3d23.0715507!4d72.5165513!16s%2Fg%2F11w8jfsb93?authuser=0&entry=ttu&g_ep=EgoyMDI1MDIxOC4wIKXMDSoASAFQAw%3D%3D">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span>
                    Location
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="header_bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                  <span>
                    EduNeuroHRx
                  </span>
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav  ">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="">Jobs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html"> About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-user" aria-hidden="true"></i> Login/Register</a>
                    </li> -->
                    <!-- <form class="form-inline">
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </button> 
                    </form> -->
                  <!-- </ul>
                </div>
              </nav>
            </div>
          </div>
        </header> -->
        <!-- end header section -->
<!-- 
</body>
</html> -->

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
                <a class="navbar-brand" href="{{ route('home') }}">
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
                      <a class="nav-link" href="{{ route('jobs') }}">Jobs</a>
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