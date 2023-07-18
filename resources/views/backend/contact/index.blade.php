@extends('layouts.app') @section('title',$module.'List') @section('content')

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
                    <a class="btn btn-warning"
                       href="{{ url('/export-contacts') }}">
                        Export Contacts Data
                    </a>

                </h3>
{{--                <form action="{{ route('uploadContacts') }}" enctype="multipart/form-data" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="col-lg-12 py-3">--}}
{{--                        <label for="users">Upload Contacts File</label>--}}
{{--                        <input type="file" class="form-control" style="padding: 3px;" name="contacts" required />--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-success" name="upload">Upload</button>--}}
{{--                </form>--}}

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Topic</th>
                        <th>Message</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['records'] as $record)
                        <tr>
                            <td>{{$data['startNumber']++}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->topic}}</td>
                            <td>{{$record->message}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $data['records']->links('vendor.pagination.bootstrap-5') }}
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
