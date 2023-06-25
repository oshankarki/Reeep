<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REEEP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-nxunQR1Kp3tIkP8XDMOns5E3C/W2o1zJZ5gNtm6Fy7NQ29+ew5hRbR5qW/37w/DiCL1rtQ6DglRs3I64zZGRIw==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-R4vs1y5tvEExbYbW9C3Srs5yhx5ebklHEWUd3BlugvUuLtvH9ZFFAJ/okC6mF5g5M9HXwOcIbPq6dHw2ts3CAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" /> {{-- parrallx--}}
    <link rel="stylesheet" href="https://unpkg.com/parallax-js@1.5.0/parallax.min.css">
    <style>
        .dropdown-menu {
            margin-top: 0;
            background-color: transparent;
            color:white;
            border:none;
        }

        .dropdown-menu .dropdown-toggle::after {
            vertical-align: middle;
            border-left: 4px solid;
            border-bottom: 4px solid transparent;
            border-top: 4px solid transparent;
        }

        .dropdown-menu .dropdown .dropdown-menu {
            left: 100%;
            top: 0%;
            margin: 0 20px;
            border-width: 0;
        }

        .dropdown-menu .dropdown .dropdown-menu.left {
            right: 100%;
            left: auto;
        }

        @media (min-width: 768px) {
            .dropdown-menu .dropdown .dropdown-menu {
                margin: 0;
                border-width: 1px;
            }
            .dropdown-menu>li a:hover,
            .dropdown-menu>li.show {
                background: lightblue;
                color: black;
            }
            .dropdown-menu>li.show>a {
                color: white;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid text-light logo d-flex justify-content-center align-items-center">
    <img src="{{asset('assets/img/logo.jpeg')}}" alt="logo" height="100px">
</div>
<header>
<nav class=" my-nav navbar navbar-light navbar-expand-lg" id="my-nav">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarSupportContent">
            @include('partials.homemenu')
        </div>
    </div>

</nav>
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('storage/images/'.$data['bannerFirst']->image) }}" alt="Banner Image" height="850">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">{{$data['bannerFirst']->description}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($data['banners'] as $banner)
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('storage/images/'.$banner->image) }}" alt="Banner Image" height="850">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">{{$banner->description}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
</header>


<!-- About Start -->
<div class="container-xxl py-5" id="about">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded" data-wow-delay="0.1s" src="{{ asset('storage/images/'.$data['about']->image) }}" height="700">
            </div>
            <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="display-1 text-primary mb-0">About</h1>
                <p class="text-primary mb-4">REEEP</p>
                <h1 class="display-5 mb-4">Renewable Energy and Energy Efficiency Programme</h1>
                <p class="mb-4">{{$data['about']->description}}</p>
                <a class="btn btn-primary py-3 px-4" href="about.html">Explore More</a>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="row g-5">
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="border-start ps-4">
                            <i class="fa fa-users fa-3x text-primary mb-3"></i>
                            <h4 class="mb-3">Program Description</h4>
                            <span>{{$data['about']->program_description}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="{{asset('assets/img/meetings.jpeg')}}">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white">SAVE</h1>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-4" style="color: #81e81a;">ENERGY</h1>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-4 text-white">SAVE</h1>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <h1 class="display-4" style="color: #81e81a;">EARTH</h1>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Features Start -->
<div class="container-xxl py-5" id="areas">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-4">Working Areas</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-4" href="areas.html">Explore More</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                        <i class="fa fa-check fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="mb-0">Area 1</h4>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                        <i class="fa fa-check fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="mb-0">Area 2</h4>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                        <i class="fa fa-users fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="mb-0">Area 3</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-tools fa-3x text-primary"></i>
                            </div>
                            <h4 class="mb-0">Area 4</h4>
                        </div>
                        <br>
                        <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-tools fa-3x text-primary"></i>
                            </div>
                            <h4 class="mb-0">Area 5</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


<!-- Service Start -->
<div class="container-xxl py-5" id="news">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Our Events and News</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="{{asset('assets/img/1 banner.JPG')}}" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <h4 class="mb-3">Energy Ministry proposes check on power consumption by businesses</h4>
                        <p class="mb-4">The ministry made the move in a bid to encourage usage of energy-efficient technology, machines and equipment to reduce energy imports and curb...</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="{{asset('assets/img/1 banner.JPG')}}" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <h4 class="mb-3">AEPC to promote Energy Efficiency</h4>
                        <p class="mb-4">The Government of Nepal has designated the Alternative Energy Promotion Centre (AEPC) as the energy efficiency entity of the Government of Nepal. The decision has been made through the</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="{{asset('assets/img/1 banner.JPG')}}" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <h4 class="mb-3">National Energy Efficiency Strategy</h4>
                        <p class="mb-4">Nepal has now a National Energy Efficiency Strategy, a specific strategy for the promotion of energy efficiency in the country. The government of Nepal has approved the National Energy Efficiency Strategy (NEEST) </p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center">
                <a href="news.html" class="btn btn-primary py-3 px-4" type="submit">Explore More</a>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->


<!-- Quote Start -->

<!-- Quote End -->


<!-- Projects Start -->
<div class="container-xxl py-5" id="gallery">
    <div class="container">
        <!-- model1 -->
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Gallery</h1>
        </div>
        <div style="position: relative; display: inline-block;" class="m-2">
            <!-- Button trigger modal -->
            <img src="{{asset('assets/img/4 banner.JPG')}}" alt="image" height="400" width="400" class="rounded">
            <button type="button" class="rounded-circle mx-2 centered-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-eye"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image album</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('assets/img/1 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/2 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/3 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="position: relative; display: inline-block;" class="m-2">
            <!-- Button trigger modal -->
            <img src="{{asset('assets/img/4 banner.JPG')}}" alt="image" height="400" width="400" class="rounded">
            <button type="button" class="rounded-circle mx-2 centered-button" data-bs-toggle="modal" data-bs-target="#exampleModalOne">
                <i class="fa fa-eye"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalOne" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image album</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControlsOne" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('assets/img/1 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/2 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/3 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsOne" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsOne" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="position: relative; display: inline-block;" class="m-2">
            <!-- Button trigger modal -->
            <img src="{{asset('assets/img/3 banner.JPG')}}" alt="image" height="400" width="400" class="rounded">
            <button type="button" class="rounded-circle mx-2 centered-button" data-bs-toggle="modal" data-bs-target="#exampleModalTwo">
                <i class="fa fa-eye"></i>
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalTwo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image album</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControlsTwo" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('assets/img/1 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/1 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('assets/img/1 banner.JPG')}}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsTwo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsTwo" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="col-12 text-center">
        <a href="images.html" class="btn btn-primary py-3 px-4" type="submit">See More</a>
    </div>
</div>

</div>


<!-- Projects End -->


<!-- Team Start -->
<div class="container-xxl py-5 " id="resources">
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-5">Knowledge and Resources</h1>
            </div>
            <div class="services_section_2 layout_padding">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box_main">
                            <div class="student_bg"><img src="{{asset('assets/img/3.JPG')}}" class="student_bg"></div>
                            <h4 class="hannery_text">There are many variations</h4>
                            <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box_main">
                            <div class="student_bg"><img src="{{asset('assets/img/aboutus.jpg')}}" class="student_bg"></div>
                            <h4 class="hannery_text">There are many variations</h4>
                            <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box_main">
                            <div><img src="{{asset('assets/img/aboutus.jpg')}}" class="student_bg"></div>
                            <h4 class="hannery_text">There are many variations</h4>
                            <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 text-center">
                <a href="images.html" class="btn btn-primary py-3 px-4" type="submit">See More</a>
            </div>

        </div>

    </div>
</div>
<!-- Team End -->

<div class="container-fluid bg-white text-light mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Our Partners</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <img src="{{asset('assets/img/gov.png')}}" alt="" srcset="" width="200">
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="{{asset('assets/img/gov.png')}}" alt="" srcset="" width="200">
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="{{asset('assets/img/gov.png')}}" alt="" srcset="" width="200">
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="{{asset('assets/img/gov.png')}}" alt="" srcset="" width="200">
            </div>
        </div>
    </div>
</div>


<div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="{{ asset('assets/img/gov.png') }}" id="contacts">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 text-center mb-5">Get in touch!</h1>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-light border-0" id="gname" placeholder="Gurdian Name">
                                <label for="gname">Your Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control bg-light border-0" id="gmail" placeholder="Gurdian Email">
                                <label for="gmail">Your Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-light border-0" id="cname" placeholder="Child Name">
                                <label for="cname">Your Mobile</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-light border-0" id="cage" placeholder="Child Age">
                                <label for="cage">Select a  Topic</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-light border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary py-3 px-4" type="submit">Submit Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn " data-wow-delay="0.1s ">
    <div class="container py-5 ">
        <div class="row g-5 ">
            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">Our Office</h4>
                <p class="mb-2 "><i class="fa fa-map-marker-alt me-3 "></i>Prayag Marg, Kathmandu</p>
                <p class="mb-2 "><i class="fa fa-phone-alt me-3 "></i>+012 345 67890</p>
                <p class="mb-2 "><i class="fa fa-envelope me-3 "></i>info@reeep.com</p>
                <div class="d-flex pt-2 ">
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href=" "><i class="fab fa-twitter "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href=" "><i class="fab fa-facebook-f "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href=" "><i class="fab fa-youtube "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href=" "><i class="fab fa-linkedin-in "></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">REEEP Partners</h4>
                <a class="btn btn-link " href=" ">
                    Ministry of Energy, Water Resources and Irrigation (MoEWRI)</a>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">Quick Links</h4>
                <a class="btn btn-link " href="about.html">About Us</a>
                <a class="btn btn-link " href="contact.html">Contact Us</a>
                <a class="btn btn-link " href="news.html">News and evevnts</a>
                <a class="btn btn-link " href="">Partners</a>

                <a class="btn btn-link " href="downloads.html">Downloads</a>
            </div>
            <div class="col-lg-3 col-md-8 ">
                <h4 class="text-white mb-4 ">Map</h4>
                <div id="map " style="width: 100%;">
                    <div style="z-index: 10; padding: 0 5px;background-color: hsla(0,0%,100%,.5);margin: 0; position:absolute; bottom:0px; right: 0px ">
                        © <a href="https://www.openstreetmap.org/copyright " rel="noopener noreferrer no follow " target="_blank ">OpenStreetMap contributors</a></div>
                    <div style="height: 200px; ">
                        <a href="https://baato.io " rel="noopener noreferrer no follow " target="_blank "><img src="https://sgp1.digitaloceanspaces.com/baatocdn/images/BaatoLogo.svg " alt="Baato " width="80px "></img>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4 " style="background-color: #648c3c; ">
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 ">
                &copy; <a class="border-bottom " href="# ">REEEP</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end
                    ">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal ". Thank you for your support. ***/-->
                Designed By <a href="https://youngminds.com.np ">Young Minds</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="# " class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top "><i class="bi bi-arrow-up "></i></a>
<script>
    var markers = [];

    var map = new mapboxgl.Map({
        container: "map ",
        style: "https://api.baato.io/api/v1/styles/breeze?key=bpk.6K0DH6XFi_EQX06vPjYNGSYtM6web8A5h29hWrlRqGt- ", // Baato stylesheet location
        center: [85.34417957669979, 27.691326002865992], // starting position [lng, lat]
        zoom: 12, // starting zoom
    });

    function clearMarkers() {
        markers.forEach((marker) => marker.remove());
        markers = [];
    }

    function showLocation() {
        var longitude = 85.34417957669979; // Specify the longitude for the location
        var latitude = 27.691326002865992; // Specify the latitude for the location

        clearMarkers();
        var marker = new mapboxgl.Marker()
            .setLngLat([longitude, latitude]) // setting latitude and longitude for the marker
            .addTo(map);
        markers.push(marker);

        // Center the map on the specified location
        map.setCenter([longitude, latitude]);
    }

    // Call the showLocation function to display the specified location on the map
    showLocation();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function bootnavbar(options) {
        const defaultOption = {
            selector: "my-nav",
            animation: true,
            animateIn: "animate__fadeIn",
        };

        const bnOptions = {...defaultOption,
            ...options
        };

        init = function() {
            var dropdowns = document
                .getElementById(bnOptions.selector)
                .getElementsByClassName("dropdown");

            Array.prototype.forEach.call(dropdowns, (item) => {
                //add animation
                if (bnOptions.animation) {
                    const element = item.querySelector(".dropdown-menu");
                    element.classList.add("animate__animated");
                    element.classList.add(bnOptions.animateIn);
                }

                //hover effects
                item.addEventListener("mouseover", function() {
                    this.classList.add("show");
                    const element = this.querySelector(".dropdown-menu");
                    element.classList.add("show");
                });

                item.addEventListener("mouseout", function() {
                    this.classList.remove("show");
                    const element = this.querySelector(".dropdown-menu");
                    element.classList.remove("show");
                });
            });
        };

        init();
    }
</script>
<script>
    new bootnavbar();
</script>
<script src="https://unpkg.com/parallax-js@1.5.0/parallax.min.js"></script>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js "></script>
<script src="lib/wow/wow.min.js "></script>
<script src="lib/easing/easing.min.js "></script>
<script src="lib/waypoints/waypoints.min.js "></script>
<script src="lib/owlcarousel/owl.carousel.min.js "></script>
<script src="lib/counterup/counterup.min.js "></script>
<script src="lib/parallax/parallax.min.js "></script>
<script src="lib/isotope/isotope.pkgd.min.js "></script>
<script src="lib/lightbox/js/lightbox.min.js "></script>

<!-- Template Javascript -->
<script src="js/main.js "></script>

</body>

</html>
