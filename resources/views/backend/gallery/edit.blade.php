@extends('layouts.app')
@section('title',$module.'Create') @section('content')
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
                <h3 class="card-title"> {{$module}}
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
            {!! Form::model($data['record'], ['route' => [$base_route . 'update', $data['record']], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    {!!Form::label('album_id ','Album Name')!!}
                    {!!Form::select ('album_id',$data['album'],null,['class'=> 'form-control'])!!}
                </div>

                Previous Image:
                <br>
                @if($data['record'])
                    <img src="{{ asset('storage/images/'.$data['record']->image) }}" alt="Banner Image" height="200px" width="200">
                @endif
                <br>
                New Image:
                <div id="imagePreviewContainer" style="display: none;">
                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                </div>
                <br>
                <div class="form-group">
                    {!!Form::label('image ','Image')!!}
                    {!! Form::file('image', ['class' => 'form-control-file', 'placeholder' => 'Image', 'onchange' => 'previewImage(this)', 'accept' => 'image/*']) !!}

                </div>

                <div class="form-group">
                    {!!Form::label('title','Title')!!}
                    {!!Form::text('title',null,['class'=> 'form-control','placeholder'=>'Title'])!!}
                    @error('title')
                    <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
                    <i class="fa fa-plus"></i>
                    Add
                </button>
                <div class="card-footer">
                    {!!Form::submit('Save' ,['class'=>'btn btn-success'])!!}
                    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
                </div>
            </div>
            {{ Form::close() }}

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
@section('js')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreviewContainer').show();
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#imagePreview').attr('src', '#');
                $('#imagePreviewContainer').hide();
            }
        }
    </script>
@endsection
