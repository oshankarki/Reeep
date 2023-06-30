@extends('layouts.frontend')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Institutional Framework</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                    <li class="breadcrumb-item active" aria-current="page">Framework</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class=" rounded" data-wow-delay="0.1s" src="{{ asset('storage/images/'.$framework->image) }}" height="500" width="250px">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">About</h1>
                    <h1 class="display-5 mb-4">{{$framework->title}}</h1>
                    <p class="mb-4">{{$framework->description}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection

