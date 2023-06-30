@extends('layouts.frontend')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Partners</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Partners</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid bg-white text-light mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                @foreach($partners as $partner)
                    <div class="col-lg-3 col-md-6 text-center">
                        <img src="{{asset('assets/img/gov.png')}}" alt="" srcset="" width="200">
                        <br>
                        <p class="text-primary font-weight-bold">{{$partner->title}}</p>
                        <p class="text-dark" >Src:<a class="text-primary" href="{{$partner->link}}">{{ $partner->link}}</a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

