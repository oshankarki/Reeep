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
</header>

@yield("content")
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn " data-wow-delay="0.1s ">
    @include('partials.footer')
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
