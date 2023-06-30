@extends('layouts.frontend')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">News and Events</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container ">
        <form action="{{route('news')}}" method="GET" class="d-flex">
            <div class="input-group">
                <select name="category" class="form-select" aria-label="Select Category">
                    <option value="">All</option>
                    <option value="1">News</option>
                    <option value="2">Events</option>
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="container-xxl py-5" id="news">
        <div class="container">
            <div class="row g-4">
                @foreach($news as $news)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('storage/images/'.$news->image) }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <h4 class="mb-3">{{$news->title}}</h4>
                                <h6 class="mb-3">
                                    @if($news->category==1)
                                        (News)
                                    @else
                                        (Events)
                                    @endif</h6>
                                <p class="mb-4">{{substr($news->description, 0, 100)}}</p>
                                <a class="btn btn-sm" href="{{route('news.show',$news->slug)}}"><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
        </div>
    </div>

@endsection

