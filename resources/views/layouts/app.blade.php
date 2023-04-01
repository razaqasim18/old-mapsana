<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Mapsana</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('front_assets/favicon.png') }}" rel="icon" />

    @yield('style')

    <!-- Icon Font Stylesheet -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    {{-- <link href="{{ asset('front_assets/online-links/bootstrap-icons.css') }}" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front_assets/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front_assets/lib/twentytwenty/twentytwenty.css') }}" rel="stylesheet" />

    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" src="{{ asset('front_assets/online-links/all.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" src="{{ asset('front_assets/online-links/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="{{ asset('front_assets/online-links/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/online-links/bootstrap.min.js') }}"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-lg-0 getiton">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2 text-primary ms-1">Get it on :</small>
                    <a href="" class="ms-2 me-2"><img src="{{ asset('front_assets/img/playstore.png') }}"
                            alt="" width="20px" height="20px" /></a>
                    <a href=""></a>
                    <i class="fa-brands fa-apple" style="font-size: 24px !important; color: #000;"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-lg-end d-flex align-items-center flex-row-reverse pe-4">
                <a href="" class="me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="" class="me-3"><i class="fab fa-twitter"></i></a>
                <a href="" class="me-3"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('home') }}" class="navbar-brand p-0">
            <!-- <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1> -->
            <img src="{{ asset('front_assets/logo.png') }}" height="70px" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="service.html" class="nav-item nav-link">Explore</a>
                <a href="service.html" class="nav-item nav-link">Learn more</a>
                <a href="service.html" class="nav-item nav-link">Help</a>
            </div>
            <button href="#" id="myBtn" class="btn btn-primary py-2 px-4 ms-3" data-toggle="modal"
                data-target="#Modal1">
                Sign Up
            </button>
            <button class="btn py-2 px-4 ms-3" data-toggle="modal" data-target="#Modal2">
                <!-- <i class="fa-regular fa-user-circle user-size"></i> -->
                <i class="fa-solid fa-user user-size"></i>
            </button>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- POP-UP Modal Start -->
    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-css" id="myModal" tabindex="-1" role="document">
                        <h1>Are you a?</h1>
                        <div class="categories">
                            <div class="doc roundedCorner" onclick="window.location='{{ route('doctor.login') }}'">
                                <a href="{{ route('doctor.login') }}"><img class="catg-img"
                                        src="{{ asset('front_assets/service-imgs/doctor.png') }}" alt="doctor-img" />
                                    <h4 class="mtext">Doctor</h4>
                                </a>
                            </div>
                            <div class="patient roundedCorner" onclick="window.location='{{ route('login') }}'">
                                <a href="{{ route('login') }}">
                                    <img class="catg-img" src="{{ asset('front_assets/service-imgs/patient.png') }}"
                                        alt="patient-img" />
                                    <h4 class="mtext">Patient</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POP-UP Modal End -->

    <!-- signin modal start -->
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-css" id="myModal" tabindex="-1" role="document">
                        <h1>Are you a?</h1>
                        <div class="categories">
                            <div class="doc roundedCorner"
                                onclick="window.location='{{ route('doctor.register') }}'">
                                <a href="{{ route('doctor.register') }}"><img class="catg-img"
                                        src="{{ asset('front_assets/service-imgs/doctor.png') }}" alt="doctor-img" />
                                    <h4 class="mtext">Doctor</h4>
                                </a>
                            </div>
                            <div class="patient roundedCorner" onclick="window.location='{{ route('register') }}'">
                                <a href="{{ route('register') }}">
                                    <img class="catg-img" src="{{ asset('front_assets/service-imgs/patient.png') }}"
                                        alt="patient-img" />
                                    <h4 class="mtext">Patient</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- signin modal end -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 pb-5">
        <div class="row pcontainer pt-5 quick">
            <div class="col-md-3 col-sm-12">
                <img src="{{ asset('front_assets/logo.png') }}" height="80px" alt="footer_logo">
                <p class="text-dark">
                    Bibendum integer mattis mus quam tempor massa imperdiet cubilia nascetur
                    libero ipsum Bibendum integer mattis mus quam tempor massa imperdiet
                    cubilia
                </p>
                <a href="" class="me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="" class="me-3"><i class="fab fa-twitter"></i></a>
                <a href="" class="me-3"><i class="fab fa-youtube"></i></a>
            </div>

            <div class="col-md-3 col-sm-12 ps-md-5">
                <h3 class="text-dark mb-4">Mapsana</h3>
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Who we
                    are?</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Our
                    mission</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Verification
                    process</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Privacy
                    policy</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Terms of
                    use</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Cookies
                    policy</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Legal
                    base</a><br />
            </div>

            <div class="col-md-3 col-sm-12">
                <h3 class="text-dark mb-4">Collaboation</h3>
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Independent
                    health
                    professional</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Healthcare
                    companies</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Hospital and
                    clinics</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Health
                    insurance</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Pediatrician</a>
            </div>

            <div class="col-md-3 col-sm-12">
                <h3 class="text-dark mb-4">Clients Service</h3>
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Faqs</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>List of all
                    services</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Derechos y
                    deberes</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Quick access by
                    map</a><br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Report a
                    problem</a>
                <br />
                <a href="#" class="text-dark"><i class="fa-solid fa-angle-right me-2 mb-3"></i>Contact us</a>
                <div class="d-flex mt-3">
                    <a class="" href="#">
                        <img src="{{ asset('front_assets/img/Google-Play_button.png') }}" alt=""
                            width="140" height="50" class="attachment-full me-1 size-full" alt
                            loading="lazy" />
                    </a>
                    <a class="" href="#">
                        <img src="{{ asset('front_assets/img/App-Store_button.png') }}" alt=""
                            width="140" height="50" class="attachment-full size-full" alt loading="lazy" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container-fluid bg-primary py-3">
            <div class="row frow">
                <div class="col-md-6 col-sm-6 text-light">
                    <p class="mb-md-0" style="font-size: 13px">
                        <span class="fwcustom">Copyright © 2023,</span> All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 text-end">
                    <p class="mb-md-0 text-light" style="font-size: 13px">
                        <span class="fwcustom">
                            Powered by:
                        </span>
                        <a class="tt" href="https://trylotech.com/" target="_blank">Trylo Tech</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="{{ asset('front_assets/online-links/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/online-links/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/waypoints/waypoints.min.js') }}"></script>
    <!-- <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script> -->
    <script src="{{ asset('front_assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('front_assets/lib/twentytwenty/jquery.event.move.js') }}"></script>
    <script src="{{ asset('front_assets/lib/twentytwenty/jquery.twentytwenty.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    @yield('script')
    <!-- Template Javascript -->
</body>

</html>
