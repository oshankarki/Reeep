@extends('layouts.frontend')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="{{ asset('storage/images/'.$about->image) }}" height="700">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">About</h1>
                    <p class="text-primary mb-4">REEEP</p>
                    <h1 class="display-5 mb-4">Renewable Energy and Energy Efficiency Programme</h1>
                    <p class="mb-4">{{$about->description}}</p>
                    <a class="btn btn-primary py-3 px-4" href="about.html">Explore More</a>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Program Description</h4>
                                <span>{{$about->program_description}}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-5">Institutional Framework</h1>
            </div>
            <div class="row g-4">
                @foreach($frameworks as $framework)
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="team-item rounded">
                        <img  src="{{ asset('storage/images/'.$framework->image) }}" alt="" height="366" width="366">
                        <div class="team-text">
                            <h4 class="mb-0">{{$framework->title}}</h4>
                            <p class="text-primary">{{substr($framework->description, 0, 100)}} <a href="{{route('framework.show',$framework->id)}}" class="btn btn-primary">See More</a> </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

