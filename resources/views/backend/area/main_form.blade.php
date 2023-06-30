
    <div class="form-group">
        {!!Form::label('image', 'Area Image')!!}
        <br>
        {!!Form::file('image', ['placeholder' => 'Image', 'onchange' => 'previewImage(this)','accept'=>'image/*'])!!}
        @error('image')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div id="imagePreviewContainer" style="display: none;">
        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
    </div>
    <div class="form-group">
        {!!Form::label('title','Working Area Title')!!}
        {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Working Area Title'])!!}
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
        {!!Form::textarea('description',null,['class'=> 'form-control','placeholder'=>'Working Area Description'])!!}
        @error('description')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
