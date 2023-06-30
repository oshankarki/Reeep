
    <div class="form-group">
        {!!Form::label('image', 'Resource and Knowledge Image')!!}
        <br>
        {!!Form::file('image', ['placeholder' => 'Image', 'onchange' => 'previewImage(this)','accept'=>'image/*'])!!}
        @error('image')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div id="imagePreviewContainer" style="display: none;">
        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
    </div>
    <div class="form-group">
        {!! Form::label('pdf', 'Resource and Knowledge PDF') !!}
        <br>
        {!! Form::file('pdf', ['placeholder' => 'PDF', 'accept' => 'application/pdf', 'onchange' => 'previewPdf(this)']) !!}
        <div id="pdf-preview"></div>
        @error('pdf')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!!Form::label('title',' Title')!!}
        {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Knowledge and Resources Title'])!!}
        @error('title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('slug','Slug')!!}
        {!!Form::text ('slug',null,['class'=> 'form-control','placeholder'=>'Slug','readonly' => 'readonly'])!!}
        @error('slug')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('description','Working Area Description')!!}
        {!!Form::textarea('description',null,['class'=> 'form-control','placeholder'=>'Knowledge and Resources'])!!}
        @error('description')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
