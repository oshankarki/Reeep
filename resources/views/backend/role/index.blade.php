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
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $record)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $record->name }}</td>

                            <td>
                                <a class="btn btn-info" href="{{ route('backend.role.show',$record->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('backend.role.edit',$record->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['backend.role.destroy', $record->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
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
