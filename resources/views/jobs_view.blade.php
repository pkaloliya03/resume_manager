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

                <div class="container mt-5">
                    <div class="card shadow-lg p-4">
                        <h2 class="card-title font-weight-bold">{{ $job->title }}</h2>
                        <br>
                        <p><strong>Company:</strong> {{ $job->company_name }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Experience:</strong> {{ $job->experience }}</p>
                        <p><strong>Salary:</strong> 
                            @if(preg_match('/\d/', $job->salary)) 
                                {!! preg_replace('/(\d[\d,.]*)/', '₹$1', e($job->salary)) !!}
                            @else 
                                {{ $job->salary ?? 'N/A' }}
                            @endif
                        </p>                        
                        <p><strong>Education:</strong> {{ $job->education }}</p>
                        <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                        <p><strong>Work Mode:</strong> {{ $job->work_mode }}</p>
                        <p><strong>Required Skills:</strong> {{ $job->required_skills }}</p>
                        <p><strong>HR Contact Name:</strong> {{ $job->hr_contact_name }}</p>
                        <p><strong>HR Email:</strong> {{ $job->hr_email }}</p>
                        <p><strong>Last Date to Apply:</strong> {{ \Carbon\Carbon::parse($job->last_date_to_apply)->format('d/m/Y') }}</p>

                        <div class="d-flex justify-content-start mt-3" style="gap: 10px;">
                            @if(Auth::check())
                            <a href="{{ route('job.apply', $job->id) }}" class="btn btn-primary">Apply Now</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-danger">Login to Apply</a>
                            @endif
                            <a href="{{ route('jobs.list') }}" class="btn btn-secondary">Back</a>
                        </div>

                    </div>
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