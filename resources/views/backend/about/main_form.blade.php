
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
        {!!Form::label('description','Description in Nepali')!!}
        {!!Form::textarea('description[np]',null,['class'=> 'form-control','placeholder'=>'About Us Description'])!!}
        @error('description[np]')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('description','Description in English')!!}
        {!!Form::textarea('description[en]',null,['class'=> 'form-control','placeholder'=>'About Us Description'])!!}
        @error('description[en]')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('program_description','Program Description In Nepali')!!}
        {!!Form::textarea('program_description[np]',null,['class'=> 'form-control','placeholder'=>'About Us Program Description'])!!}
        @error('program_description[np]')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('program_description','Program Description In English')!!}
        {!!Form::textarea('program_description[en]',null,['class'=> 'form-control','placeholder'=>'About Us Program Description'])!!}
        @error('program_description[en]')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>


<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
