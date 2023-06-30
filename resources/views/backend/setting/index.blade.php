@extends('layouts.app') @section('title',$module.'List') @section('content')
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
                <h3 class="card-title">List {{$module}}
                    <a href="{{route($base_route.'create')}}" class="btn btn-info">Create</a>

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
                @include('backend.includes.flash')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Social Links</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['records'] as $record)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$record->office_location}}</td>
                            <td>{{$record->office_email}}</td>
                            <td>{{$record->office_phone}}</td>
                            <td>
                                <a href="{{$record->facebook_link}}" class="btn btn-primary" style="display:inline-block">
                                    Facebook
                                </a>
                                <a href="{{$record->instagram_link}}" class="btn btn-primary" style="display:inline-block">
                                    Instagram
                                </a>
                                <a href="{{$record->youtube_link}}" class="btn btn-primary" style="display:inline-block">
                                    Youtube
                                </a>
                                <a href="{{$record->linkedin_link}}" class="btn btn-primary" style="display:inline-block">
                                    LinkedIn
                                </a>
                            </td>
                            <td>
                                <a href="{{route($base_route.'edit',$record->id)}}" class="btn btn-warning" style="display:inline-block">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>
                                <form action="{{route($base_route.'destroy',$record->id)}}" method="post" style="display:inline-block">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
@section('js')
    <script>
        function toggleAppStatus(menuID) {
            $('#toggle-form-' + menuID).submit();
        }
    </script>
@endsection
