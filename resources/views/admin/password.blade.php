@extends('layouts.app')
@section('title','Update Profile') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Password Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active">Password</li>
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
                <h3 class="card-title"> Password
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
            {!! Form::model(Auth::user(), ['route' => [ 'admin.password.update', Auth::user()], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="password">Old Passsword</label>
                    <input type="password" class="form-control" placeholder="Enter old Password" name="current_password" value="">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter new Password" name="new_password" value="">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter Confirm new password" name="confirm_new_password" value="">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Clear</button>


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
