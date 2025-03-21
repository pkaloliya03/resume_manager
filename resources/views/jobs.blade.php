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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Font Awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

    <!-- Header Section -->
    @include('header')
    <!-- End Header Section -->

    <!-- Jobs section -->
    <section class="service_section layout_padding">

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="service_container">
            <div class="container">
                <div class="heading_container">
                    <h2>Our <span>Jobs</span></h2>
                    <p>Find the latest job opportunities here.</p>
                </div>

                <br>
                <hr>

                <!-- Resume Upload Section (Visible to All) -->
                <div class="resume-upload-section mt-5">
                    <h3>Upload Your Resume</h3>
                    <p>Enhance your chances of getting hired by uploading your resume.</p>

                    <!-- Display success message -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <!-- Resume Upload Form -->
                    <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="resume">Choose Resume (PDF) :</label>
                            <input type="file" class="form-control" name="resume" accept=".pdf," required>
                        </div>

                        <!-- Upload Button with Auth Check -->
                        <div class="mt-3">
                            @if (Auth::check())
                                <button type="submit" class="btn btn-success">Upload Resume</button>
                            @else
                                <button type="button" class="btn btn-success" disabled>Upload Resume (Login
                                    Required)</button>
                                <a href="{{ route('login') }}" class="btn btn-danger ml-2">Login to Upload</a>
                            @endif
                        </div>
                    </form>
                </div>

                <br><br><br><br>

                <div class="row">
                    @if ($jobs->count() > 0)
                        @foreach ($jobs as $job)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-lg p-3 rounded">
                                    <div class="card-body">
                                        <h4 class="card-title font-weight-bold">{{ $job->title }}</h4><br>
                                        <p><strong>Company:</strong> {{ $job->company_name }}</p>
                                        <p><strong>Location:</strong> {{ $job->location }}</p>
                                        <p><strong>Experience:</strong> {{ $job->experience }}</p>
                                        <p><strong>Salary:</strong> 
                                            @if(preg_match('/\d/', $job->salary)) 
                                                {!! preg_replace('/(\d[\d,.]*)/', '₹$1', $job->salary) !!}
                                            @else 
                                                {{ $job->salary ?? 'N/A' }}
                                            @endif
                                        </p>                                                                               
                                        <p><strong>Last Date:</strong>
                                            {{ \Carbon\Carbon::parse($job->last_date_to_apply)->format('d/m/Y') }}</p>

                                        <!-- View More Details Button -->
                                        <a href="{{ route('job_view', $job->id) }}" class="btn btn-primary">View</a>

                                        <!-- Check if the user is logged in -->
                                        @if (Auth::check())
                                            @php
                                                $hasApplied = DB::table('job_applications')
                                                    ->where('user_id', Auth::id())
                                                    ->where('job_id', $job->id)
                                                    ->exists();

                                                $hasResume = DB::table('resumes')
                                                    ->where('user_id', Auth::id())
                                                    ->exists();
                                            @endphp

                                            @if ($hasApplied)
                                                <button class="btn btn-success" disabled>Applied</button>
                                            @elseif (!$hasResume)
                                                <button class="btn btn-secondary" disabled>Upload Resume to
                                                    Apply</button>
                                            @else
                                                <form action="{{ route('job.submitapplication', $job->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Apply Now</button>
                                                </form>
                                            @endif
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
    @include('footer')
    <!-- End Footer Section -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Owl Slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
