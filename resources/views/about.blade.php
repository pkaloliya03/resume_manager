<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>EduNeuroHRx</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    /* Centering the Heading */
    .heading_container {
      text-align: center;
      margin-bottom: 30px;
    }

    .heading_container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 32px;
      /* Adjust size if needed */
      font-weight: bold;
    }

    /* Box Styling */
    .box {
      background-color: #ffffff;
      /* Adjust to match your design */
      color: #333;
      /* Adjust text color */
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.1);
      /* Soft shadow for depth */
      border: 1px solid #ddd;
      /* Adjust border color */
      margin-top: 20px;
    }

    .box .icon {
      font-size: 40px;
      color: #fdd835;
      /* Adjust icon color */
      margin-bottom: 10px;
    }

    .box h4 {
      font-weight: bold;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    .box p {
      font-size: 16px;
      line-height: 1.5;
    }

    .heading_container1 h1 {
      text-align: center;
      font-size: 32px;
      /* Adjust size if needed */
      font-weight: bold;
    }

    .heading_container1 span {
      color: #0a97b0;
    }
  </style>
</head>

<body class="sub_page">
  @include("header")
  <br><br>

  <!-- About Us Section -->
  <!-- About Us Section -->
  <section class="about_section layout_padding-bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <div class="heading_container1">
            <h1>About <span class=".us_color">Us</span></h1>
          </div>
          <br><br>
          <p>We provide a platform for job seekers, including students, freshers, and experienced employees looking for better opportunities.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Our Mission & Vision -->
  <section class="mission_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Our <span>Mission & Vision</span></h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="box">
            <div class="icon">🎯</div>
            <h4>Our Mission</h4>
            <p>To bridge the gap between job seekers and top companies by providing an easy-to-use platform for career growth.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="icon">🚀</div>
            <h4>Our Vision</h4>
            <p>To become the most trusted job-seeking platform, connecting professionals with their dream jobs globally.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Why Choose Us -->
  <section class="why_choose_us layout_padding">
    <div class="container">
      <div class="heading_container" style="text-align: center; margin-bottom: 30px;">
        <h2 style="font-size: 32px; font-weight: bold; display: inline-block;">Why <span>Choose Us?</span></h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="box">
            <div class="icon">✔</div>
            <h5>Verified Job Listings</h5>
            <p>We ensure all job postings are verified and from trusted employers.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="icon">✔</div>
            <h5>Career Support</h5>
            <p>We offer resume building, interview tips, and career guidance.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="icon">✔</div>
            <h5>Fast Hiring Process</h5>
            <p>Connect with recruiters quickly and get hired faster.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    /* Box Styling (Same as Mission & Vision Section) */
    .box {
      background-color: #ffffff;
      /* Match with your design */
      color: #333;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.1);
      border: 1px solid #ddd;
      margin-top: 20px;
    }

    .box .icon {
      font-size: 40px;
      color: #fdd835;
      /* Adjust icon color */
      margin-bottom: 10px;
    }

    .box h5 {
      font-weight: bold;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    .box p {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>


  <!-- Our Partners Section -->
<section class="our_partners layout_padding">
  <div class="container">
    <div class="heading_container" style="text-align: center; margin-bottom: 30px;">
      <h2 style="font-size: 32px; font-weight: bold;">Our <span>Partners</span></h2>
    </div>
    <div class="owl-carousel partners-slider">
      <div class="partner-box"><img src="{{ asset('images/google.png') }}" alt="Google"></div>
      <div class="partner-box"><img src="{{ asset('images/microsoft.png') }}" alt="Microsoft"></div>
      <div class="partner-box"><img src="{{ asset('images/amazon.png') }}" alt="Amazon"></div>
      <div class="partner-box"><img src="{{ asset('images/apple.png') }}" alt="Apple"></div>
      <div class="partner-box"><img src="{{ asset('images/ibm.png') }}" alt="IBM"></div>
      <div class="partner-box"><img src="{{ asset('images/tesla.png') }}" alt="Tesla"></div>
      <div class="partner-box"><img src="{{ asset('images/accenture.png') }}" alt="Accenture"></div>
      <div class="partner-box"><img src="{{ asset('images/tcs.png') }}" alt="TCS"></div>
      <div class="partner-box"><img src="{{ asset('images/infosys.png') }}" alt="Infosys"></div>
      <div class="partner-box"><img src="{{ asset('images/wipro.png') }}" alt="Wipro"></div>
    </div>
  </div>
</section>

<!-- Include Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- CSS for Boxed Slider -->
<style>
  .partners-slider {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 0;
  }

  .partner-box {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 10px;
    transition: transform 0.3s ease-in-out;
  }

  .partner-box:hover {
    transform: scale(1.05);
  }

  .partner-box img {
    max-width: 140px; /* Increased size */
    max-height: 80px; /* Adjusted height */
    object-fit: contain;
    display: block;
    margin: auto;
  }
</style>

<!-- Owl Carousel Initialization -->
<script>
  $(document).ready(function() {
    if ($(".partners-slider").length) {
      $(".partners-slider").owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500, /* Adjusted speed */
        smartSpeed: 600,
        responsive: {
          0: { items: 2 },
          600: { items: 3 },
          1000: { items: 5 }
        }
      });
    }
  });
</script>


  <!-- Success Stories -->
  <section class="success_section layout_padding">
    <div class="container">
      <div class="heading_container text-center">
        <h2>Success <span>Stories</span></h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="success_card text-center">
            <img src="images/rahul.jpg" alt="Rahul Sharma">
            <h6>"I landed my first IT job within a month!"</h6>
            <p>- Rahul Sharma</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="success_card text-center">
            <img src="images/priya.jpg" alt="Priya Patel">
            <h6>"This platform made my job switch process seamless!"</h6>
            <p>- Priya Patel</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="success_card text-center">
            <img src="images/amit.jpg" alt="Amit Verma">
            <h6>"I got connected with top Multi National Company's!"</h6>
            <p>- Amit Verma</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .success_section {
      padding: 50px 0;
    }

    .success_card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
      transition: transform 0.3s ease;
      text-align: center;
    }

    .success_card:hover {
      transform: translateY(-5px);
    }

    .success_card img {
    width: 100px;  /* Increased size */
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 10px;
    border: 4px solid #007bff;
}


    .success_card h6 {
      font-size: 16px;
      font-weight: bold;
      color: #333;
      margin-top: 10px;
    }

    .success_card p {
      font-size: 14px;
      color: #666;
      font-style: italic;
      margin-top: 5px;
    }
  </style>


  @include("footer")
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>