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
    <link rel="shortcut icon" href="images/fevicon.png" type="">

    <title> EduNeuroHRx </title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

    <!-- Header Section -->

    @include('header')

    <!-- End Header Section -->

    <br><br>

    <!-- contact section -->
    <section class="contact_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5 offset-md-1">
                    <div class="heading_container">
                        <h2>
                            User <span class="us_color">Dashboard</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Applied Jobs Table -->
                <div class="col-md-8 offset-md-2 mt-5">
                    <h3>Applied Jobs</h3>
                    <br>

                    @if ($appliedJobs->isNotEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Applied on</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appliedJobs as $job)
                                    <tr>
                                        <td class="p-3 border border-gray-300 font-bold">{{ $job->job->title }}</td>
                                        <td class="p-3 border border-gray-300 font-bold">{{ $job->job->company_name }}</td>
                                        <td class="p-3 border border-gray-300 font-bold">{{ \Carbon\Carbon::parse($job->applied_on)->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger text-center">
                            You haven't applied for any jobs yet.
                        </div>
                    @endif
                </div>


                <!-- Resume Section -->
                <div class="col-md-8 offset-md-2 mt-5">
                    <h3>Uploaded Resume</h3>
                    <br>
                    @if ($resume)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Filename</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ basename($resume->file_path) }}</td>
                                    <td class="text-center">
                                        <a href="{{ asset($resume->file_path) }}" target="_blank"
                                            class="btn btn-primary btn-sm">
                                            View Resume
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('delete.resume') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                    <div class="alert alert-danger text-center">No Resumes Uploaded! Please Upload Resume from <a href="{{ route('jobs.list') }}">Jobs</a></div>    
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- end contact section -->


    <!-- Footer Section -->

    @include('footer')

    <!-- End Footer Section -->

    <!-- jQery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
