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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $record)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>
                                @if(!empty($record->getRoleNames()))
                                    @foreach($record->getRoleNames() as $v)
                                        <span class="badge rounded-pill bg-g">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('backend.user.show',$record->id) }}"><i class="fa fa-eye"></i> </a>
                                <a class="btn btn-warning" href="{{ route('backend.user.edit',$record->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{route('backend.user.destroy',$record->id)}}" method="post" style="display:inline-block">
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
