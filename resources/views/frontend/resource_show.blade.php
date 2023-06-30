@extends('layouts.frontend')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Knowledge and Resources</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$resource->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <section id="about" class="about">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
                            <img src="{{ asset('storage/images/'.$resource->image) }}" class="" alt="" height="300" width="500">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                            <h3>{{$resource->title}}</h3>
                            <p class="fst-italic">
                                {{$resource->description}}
                            </p>
                            <p class="">
                            <a href="{{ asset('storage/pdfs/'.$resource->pdf) }}" class="btn btn-primary">View PDF</a>
                            </p>

                        </div>
                    </div>
            </div>
            <br>

    </section>



@endsection

