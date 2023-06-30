@extends('layouts.app')
@section('title','Update Profile') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title"> Profile
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
            {!! Form::model(Auth::user(), ['route' => [ 'profile.update', Auth::user()], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
            @method('PUT')
            <div class="card-body">

            <div class="form-group">
                {!!Form::label('name','Name')!!}
                {!!Form::text ('name',null,['class'=> 'form-control','placeholder'=>'Enter your name'])!!}
                @error('name')
                <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                {!!Form::label('email','Email')!!}
                {!!Form::text ('email',null,['class'=> 'form-control','placeholder'=>'Enter your email'])!!}
                @error('email')
                <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="card-footer">
                {!!Form::submit("Update" ,['class'=>'btn btn-success'])!!}
                {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
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
