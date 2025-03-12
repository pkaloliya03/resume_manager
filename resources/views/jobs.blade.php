<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/fevicon.png') }}" type="">

    <title> EduNeuroHRx </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Font Awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

    <!-- Header Section -->
    @include("header")
    <!-- End Header Section -->

    <!-- Jobs section -->
    <section class="service_section layout_padding">
        <div class="service_container">
            <div class="container">
                <div class="heading_container">
                    <h2>Our <span>Jobs</span></h2>
                    <p>Find the latest job opportunities here.</p>
                </div>

                <br>

                <div class="row">
                    @if($jobs->count() > 0)
                        @foreach($jobs as $job)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-lg p-3 rounded">
                                    <div class="card-body">
                                        <h4 class="card-title font-weight-bold">{{ $job->title }}</h4>
                                        <p><strong>Company:</strong> {{ $job->company_name }}</p>
                                        <p><strong>Location:</strong> {{ $job->location }}</p>
                                        <p><strong>Experience:</strong> {{ $job->experience }} years</p>
                                        <p><strong>Salary:</strong> ₹{{ number_format($job->salary, 2) ?? 'N/A' }}</p>

                                        <!-- Check if the user is logged in -->
                                        @if(Auth::check())
                                            <a href="{{ route('job.apply', $job->id) }}" class="btn btn-primary">Apply Now</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-danger">Login to Apply</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted w-100">No job openings available at the moment.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>
    <!-- End Jobs section -->

    <!-- Footer Section -->
    @include("footer")
    <!-- End Footer Section -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Owl Slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

</body>

</html>
