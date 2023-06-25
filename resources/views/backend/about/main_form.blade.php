
    <div class="form-group">
        {!!Form::label('image', 'About Image')!!}
        <br>
        {!!Form::file('image', ['placeholder' => 'Image', 'onchange' => 'previewImage(this)','accept'=>'image/*'])!!}
        @error('image')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div id="imagePreviewContainer" style="display: none;">
        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
    </div>
    <div class="form-group">
        {!!Form::label('description','Description')!!}
        {!!Form::textarea('description',null,['class'=> 'form-control','placeholder'=>'About Us Description'])!!}
        @error('description')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('program_description','Program Description')!!}
        {!!Form::textarea('program_description',null,['class'=> 'form-control','placeholder'=>'About Us Program Description'])!!}
        @error('program_description')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>


<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
