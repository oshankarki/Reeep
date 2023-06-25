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

                @if ($records->children->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parent Menu</th>
                            <th>Menu Title</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records->children as $record)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$record->parent->title}}</td>
                                <td>{{$record->title}}</td>
                                <td>{{$record->slug}}</td>
                                <td>{{$record->order}}</td>
                                <td>
                                    <form id="toggle-form-{{$record->id}}" action="{{ route('menu.status', $record->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-success" onclick="toggleAppStatus({{$record->id}})">
                                            {{$record->status? 'On' : 'OFF'}}
                                        </button>
                                    </form>
                                </td>
                                <th>
                                    <a href="{{route($base_route.'show',$record->id)}}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route($base_route.'edit',$record->id)}}" class="btn btn-warning" style="display:inline-block">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route($base_route.'destroy',$record->id)}}" method="post" style="display:inline-block">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No child menu items found.<a href="{{route($base_route.'create')}}" class="btn btn-info">Create Child</a>
                    </h1>
                @endif
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
