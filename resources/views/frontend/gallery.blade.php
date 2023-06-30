@extends('layouts.frontend')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galley</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5" id="gallery">
        <div class="container">
            <!-- model1 -->
            @foreach ($album as $item)
                @if (count($item->gallery) > 0)
                    <div style="position: relative; display: inline-block;" class="m-3">
                        <!-- Button trigger modal -->
                        <img src="{{ asset('storage/images/' . $item->gallery[0]->image) }}" alt="image" height="320"
                             width="340" class="rounded">
                        <button type="button" class="rounded-circle mx-2 centered-button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>


                    {{--                    model --}}
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Image album</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExampleControls{{ $item->id }}" class="carousel slide"
                                         data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" style="height: 350px; background-color: #000">
                                                <div class="d-block w-100 p-4 text-center">
                                                    <h1 style="margin-top: 120px" class="text-white">
                                                        {{ $item->title }}
                                                    </h1>
                                                </div>
                                            </div>
                                            @foreach ($item->gallery as $pic)
                                                <div class="carousel-item" style="height: 350px">
                                                    <img src="{{ asset('storage/images/' . $pic->image) }}"
                                                         class="d-block w-100" alt="..." height="350px">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls{{ $item->id }}"
                                                data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls{{ $item->id }}"
                                                data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                @endif
            @endforeach
        </div>

    </div>
@endsection
