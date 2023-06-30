@extends('layouts.frontend')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Knowledge and Resources</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Resource</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5 " id="resources">
        <div class="blog_section layout_padding">
            <div class="container">
                <div class="services_section_2 layout_padding">
                    <div class="row">
                        @foreach($resource as $resource)
                            <div class="col-md-4">
                                <div class="box_main">
                                    <div class="student_bg"><img src="{{ asset('storage/images/' . $resource->image) }}" class="student_bg"></div>
                                    <h4 class="hannery_text">{{$resource->title}}</h4>
                                    <p class="fact_text">{{substr($resource->description, 0, 100)}}<a class="text-primary" href="{{route('resource.show',$resource->slug)}}">Read More</a>.</p>
                                    <p class="fact-text m-3"><a href="{{ asset('storage/pdfs/'.$resource->pdf) }}" class="btn btn-primary">View PDF</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

