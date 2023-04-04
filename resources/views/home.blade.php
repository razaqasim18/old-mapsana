@extends('layouts.app')
@section('style')
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

<!-- font-awesome-icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, 0.7)">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword" />
                    <button class="btn btn-primary px-4">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('front_assets/img/mapsana-imgs/herobanerimg.webp') }}" width="570px" height="450px" alt="herosection-image" style="border-radius: 0 45% 45% 0" srcset="" />
        </div>
        <div class="col-md-7">
            <h1 class="animated zoomIn hero-heading">
                Conéctate a tu vecindario <br />
                y encuentra soluciones <br />
                para tu salud <br />
                Fácil, Seguro, Cercano
            </h1>
        </div>
    </div>
</div>

<!-- Two input Searchs start -->
<div class="container-fluid banner">
    <div class="container">
        <form class="banner-form">
            <div class="row ban-col py-3">
                <div class="col-md-3 d-flex justify-content-center align-content-center">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" class="form-control pl inputtag placholder" placeholder="Type of Attention" />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control inputtag placholder pl1" placeholder="Insert your address to find health professional next to you" />
                </div>
                <div class="col-md-3 searchbtn">
                    <button class="btn btn-primary mybtn">Search</button>
                </div>
            </div>
            <!-- <br /><br /><br /><br /> -->
        </form>
    </div>
</div>

<!-- services section Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row services">
        <div class="col-md-1"></div>
        <div class="col-md-5 .scale-up-center">
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/house-medical-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Atención a domicilio</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/hands-holding-child-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Pediatría</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/user-injured-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Traumatología</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/brain-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Salud Mental</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/user-nurse-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Enfermeria</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
        </div>
        <div class="col-md-5 .scale-up-center">
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/child-reaching-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Kinesiología</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/person-pregnant-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Obstetricia</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/children-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Fonoaudiologia</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/map-location-dot-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Explore it all on the MAP</a>
                    <img src="{{ asset('front_assets/online-links/icons_svg/taxi-solid.svg') }}" class="service_img taxi" alt="svg image" />
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
            <div class="service-container">
                <div class="icon-div">
                    <img src="{{ asset('front_assets/online-links/icons_svg/user-doctor-solid.svg') }}" class="service_img" alt="svg image" />
                </div>
                <div class="service-icon-link">
                    <a href="#">Are you health professional?</a>
                    <a href="#" class="join-link">Join us</a>
                </div>
                <div>
                    <img src="{{ asset('front_assets/online-links/icons_svg/arrow-right.svg') }}" class="ar_img" alt="svg image" />
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- services section End -->

<!-- How it works Start -->
<div class="container-fluid bg-light py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-4">
                    <h1 class="display-5 mb-4 text-center">How it works?</h1>
                    <p class="mx-lg-5 px-lg-5 mb-4  text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        <br />
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                    </p>
                </div>
            </div>
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex flex-row">
                                <ul class="nav nav-tabs nav-justified vertical-tab flex-column" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-one" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
                                            <div class="circle-icon home">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <h5 class="about">About us</h5>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-two" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                                            <div class="circle-icon">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <h5>How it works</h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
                                            <div class="circle-icon">
                                                <i class="fa fa-fire"></i>
                                            </div>
                                            <h5>Our Mission</h5>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-one">
                                        <div class="text-overlayy">
                                            <div class="aboutContent">
                                                <img src="{{ asset('front_assets/service-imgs/Doctor2.png') }}" alt="" />
                                                <div class="textClass">
                                                    <h1>About Us</h1>
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Vitae alias eum
                                                        fugiat asperiores. Lorem ipsum dolor sit amet consectetur
                                                        adipisicing
                                                        elit. Vitae alias eum fugiat asperiores. Lorem ipsum dolor
                                                        sit amet
                                                        consectetur adipisicing elit. Vitae alias eum fugiat
                                                        asperiores.Lorem ipsum
                                                        dolor sit amet consectetur adipisicing elit. Vitae alias eum
                                                        fugiat
                                                        asperiores.
                                                    </p>
                                                    <a class="btn btn-primary" href="#">Submit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-two">
                                        <div class="text-overlayy">
                                            <div class="aboutContent">
                                                <img src="{{ asset('front_assets/img/howitworks.png') }}" alt="" />
                                                <div class="textClass">
                                                    <h1>How It Works</h1>
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Vitae alias eum
                                                        fugiat asperiores. Lorem ipsum dolor sit amet consectetur
                                                        adipisicing
                                                        elit. Vitae alias eum fugiat asperiores. Lorem ipsum dolor
                                                        sit amet
                                                        consectetur adipisicing elit. Vitae alias eum fugiat
                                                        asperiores.Lorem ipsum
                                                        dolor sit amet consectetur adipisicing elit. Vitae alias eum
                                                        fugiat
                                                        asperiores.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-three">
                                        <div class="text-overlayy">
                                            <div class="aboutContent">
                                                <img src="{{ asset('front_assets/img/ourmission.png') }}" alt="" />
                                                <div class="textClass">
                                                    <h1>Our Mission</h1>
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Vitae alias eum
                                                        fugiat asperiores. Lorem ipsum dolor sit amet consectetur
                                                        adipisicing
                                                        elit. Vitae alias eum fugiat asperiores. Lorem ipsum dolor
                                                        sit amet
                                                        consectetur adipisicing elit. Vitae alias eum fugiat
                                                        asperiores.Lorem ipsum
                                                        dolor sit amet consectetur adipisicing elit. Vitae alias eum
                                                        fugiat
                                                        asperiores.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How it works End -->

{{-- owl-slider --}}
<div class="container-fluid py-5 px-5" data-wow-delay="0.1s">
    <div class="">
        <h1 class="display-5 mb-4 text-center">Mapsana es una comunidad</h1>
        <p class="mx-lg-5 px-lg-5 mb-5 text-center ">
            Conoce algunos profesionales de salud más destacados
        </p>
        <div class="container-fluid prightleft">


            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body">
                            <p class="pr"><sup>$</sup>800</p>
                            <i class="fa fa-heart-circle-plus hicon"></i>
                            <div class="img d-flex justify-content-center">
                                <img src="{{ asset('front_assets/doctor-imgs/doc2.png') }}" width="100" height="100" class="card-img" alt="" />
                            </div>
                            <div>
                                <h5 class="text-center fwsix mt-2">Dr. Rebecca Lee</h5>
                                <h4 class="text-center catg">Dentist</h4>
                                <div class="strate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                    <span class="rating">4.5</span>
                                </div>
                            </div>
                            <p class="body-text text-center">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ullam voluptates, saepe error labore autem magnam?
                            </p>
                            <hr />
                            <div class="d-flex justify-content-evenly">
                                <div class="line"></div>
                                <button class="card_btn txt btn-primary">
                                    View Profile
                                </button>
                                <button class="card_btn txt btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body">
                            <p class="pr"><sup>$</sup>800</p>
                            <i class="fa fa-heart-circle-plus hicon"></i>
                            <div class="img d-flex justify-content-center">
                                <img src="{{ asset('front_assets/doctor-imgs/doc2.png') }}" width="100" height="100" class="card-img" alt="" />
                            </div>
                            <div>
                                <h5 class="text-center mt-2 fwsix">Dr. Rebecca Lee</h5>
                                <h4 class="text-center catg">Dentist</h4>
                                <div class="strate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                    <span class="rating">4.5</span>
                                </div>
                            </div>
                            <p class="body-text text-center">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ullam voluptates, saepe error labore autem magnam?
                            </p>
                            <hr />
                            <div class="d-flex justify-content-evenly">
                                <div class="line"></div>
                                <button class="card_btn txt btn-primary">
                                    View Profile
                                </button>
                                <button class="card_btn txt btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body">
                            <p class="pr"><sup>$</sup>800</p>
                            <i class="fa fa-heart-circle-plus hicon"></i>
                            <div class="img d-flex justify-content-center">
                                <img src="{{ asset('front_assets/doctor-imgs/doc2.png') }}" width="100" height="100" class="card-img" alt="" />
                            </div>
                            <div>
                                <h5 class="text-center mt-2 fwsix">Dr. Rebecca Lee</h5>
                                <h4 class="text-center catg">Dentist</h4>
                                <div class="strate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                    <span class="rating">4.5</span>
                                </div>
                            </div>
                            <p class="body-text text-center">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ullam voluptates, saepe error labore autem magnam?
                            </p>
                            <hr />
                            <div class="d-flex justify-content-evenly">
                                <div class="line"></div>
                                <button class="card_btn txt btn-primary">
                                    View Profile
                                </button>
                                <button class="card_btn txt btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body">
                            <p class="pr"><sup>$</sup>800</p>
                            <i class="fa fa-heart-circle-plus hicon"></i>
                            <div class="img d-flex justify-content-center">
                                <img src="{{ asset('front_assets/doctor-imgs/doc2.png') }}" width="100" height="100" class="card-img" alt="" />
                            </div>
                            <div>
                                <h5 class="text-center mt-2 fwsix">Dr. Rebecca Lee</h5>
                                <h4 class="text-center catg">Dentist</h4>
                                <div class="strate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                    <span class="rating">4.5</span>
                                </div>
                            </div>
                            <p class="body-text text-center">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ullam voluptates, saepe error labore autem magnam?
                            </p>
                            <hr />
                            <div class="d-flex justify-content-evenly">
                                <div class="line"></div>
                                <button class="card_btn txt btn-primary">
                                    View Profile
                                </button>
                                <button class="card_btn txt btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body">
                            <p class="pr"><sup>$</sup>800</p>
                            <i class="fa fa-heart-circle-plus hicon"></i>
                            <div class="img d-flex justify-content-center">
                                <img src="{{ asset('front_assets/doctor-imgs/doc2.png') }}" width="100" height="100" class="card-img" alt="" />
                            </div>
                            <div>
                                <h5 class="text-center mt-2 fwsix">Dr. Rebecca Lee</h5>
                                <h4 class="text-center catg">Dentist</h4>
                                <div class="strate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half"></i>
                                    <span class="rating">4.5</span>
                                </div>
                            </div>
                            <p class="body-text text-center">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ullam voluptates, saepe error labore autem magnam?
                            </p>
                            <hr />
                            <div class="d-flex justify-content-evenly">
                                <div class="line"></div>
                                <button class="card_btn txt btn-primary">
                                    View Profile
                                </button>
                                <button class="card_btn txt btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-5 d-flex justify-content-around align-items-center">
            <div>
                <p class="mb-0 text-center ">
                    y aprovecha todos los beneficios uniéndote ahora a nuestro equipo
                </p>
            </div>
            <div class="ml-2">
                <butxton class="btn btn-primary mybtn" onclick="document.location='login-signup.html'">Join
                    us</button>
            </div>
        </div>
    </div>
</div>
{{-- owl-slider --}}
@endsection
@section('script')
<script src="{{ asset('front_assets/online-links/jquery.min.js') }}"></script>
<script src="{{ asset('front_assets/online-links/owl.carousel.js') }}"></script>

<script>
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplaytimeout: 1000,
        slidespeed: 1000,
        items: 3,
        // stagePadding: 30,
        loop: true,
        margin: 40,
        dots: false,
        responsiveClass: true,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        responsive: {
            0: {
                dots: true,
                items: 1,
            },
            600: {
                dots: true,
                items: 3,
            },
            1000: {
                dots: false,
                margin: 40,
                // stagePadding: 0,
                items: 3,
            },
        },
    });
</script>
@endsection