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
                <div class="card" style="width: 30rem";>
                    <img class="card-img-top" src="{{ asset('storage/images/'.$record->image) }} " alt="Card image cap" height="300" width="300">
                    <div class="card-body" >
                        <br>
                        <h3 class="card-title font-weight-bold">{{$record->title}}</h3>
                        <p class="card-text">{{$record->description}}</p>
                        <p class="card-text"><a href="{{ asset('storage/pdfs/'.$record->pdf) }}" class="btn btn-primary">View PDF</a>.</p></p>

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
