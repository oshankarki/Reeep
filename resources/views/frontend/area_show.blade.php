@extends('layouts.frontend')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Working Areas</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Working Area</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$area->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-2 justify-content-center">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">{{$area->title}}</a>
                    </h3>
                    <p class="card-text mb-auto">{{$area->description}}</p>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('storage/images/'.$area->image) }}" alt="Area" height="20">

            </div>
        </div>
    </div>



@endsection

