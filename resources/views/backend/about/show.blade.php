@extends('layouts.app') @section('title',$module.'Details') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$module}} Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$module}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$module}} Details

                    <a href="{{route($base_route.'index')}}" class="btn btn-info">List</a>

                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-xxl py-5" id="about">
                    <div class="container">
                        <div class="row g-5 align-items-end">
                            <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">

                                <img class="img-fluid rounded" data-wow-delay="0.1s" src="{{ asset('storage/images/'.$record->image) }}" height="700">
                            </div>
                            <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                                <h1 class="display-1 text-primary mb-0">About</h1>
                                <p class="text-primary mb-4">REEEP</p>
                                <h1 class="display-5 mb-4">Renewable Energy and Energy Efficiency Programme</h1>
                                <p class="mb-4">{{$record->description}}.</p>
                            </div>
                            <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="row g-5">
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <div class="border-start ps-4">
                                            <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                            <h4 class="mb-3">Program Description</h4>
                                            <span>{{$record->program_description}}.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
