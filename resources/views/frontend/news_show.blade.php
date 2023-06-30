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
                    <li class="breadcrumb-item active" aria-current="page">{{$news->category==1?"News":"Events"}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <!-- Hot Aimated News Tittle-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach($newsLatest as $newsLat)
                                    <li class="news-item">
                                        <a href="{{route('news.show',$newsLat->slug)}}">
                                        {{$newsLat->title}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div>
                                <img  src="{{ asset('storage/images/'.$news->image) }}" alt="" height="500" width="500">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>{{$news->title}}</h3>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25">
                                {{$news->description}}
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25">
                                Created at: {{$news->created_at}}
                            </div>
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <div class="d-flex pt-2 ">
                                        <a class="btn btn-square btn-outline-dark rounded-circle me-2 " href=" "><i class="fab fa-twitter "></i></a>
                                        <a class="btn btn-square btn-outline-dark rounded-circle me-2 " href=" "><i class="fab fa-facebook-f "></i></a>
                                        <a class="btn btn-square btn-outline-dark rounded-circle me-2 " href=" "><i class="fab fa-youtube "></i></a>
                                        <a class="btn btn-square btn-outline-dark rounded-circle me-2 " href=" "><i class="fab fa-linkedin-in "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- From -->

                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Write to Us</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>

                                <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!-- About US End -->
    </main>



@endsection

