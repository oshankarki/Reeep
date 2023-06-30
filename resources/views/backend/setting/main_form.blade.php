
    <div class="form-group">
        {!!Form::label('office_location',' Office Location')!!}
        {!!Form::text ('office_location',null,['class'=> 'form-control','placeholder'=>'Office Location'])!!}
        @error('office_location')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('office_phone',' Office Phone')!!}
        {!!Form::text ('office_phone',null,['class'=> 'form-control','placeholder'=>'Office Phone'])!!}
        @error('office_phone')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('office_email',' Office Email')!!}
        {!!Form::text ('office_email',null,['class'=> 'form-control','placeholder'=>'Office Email'])!!}
        @error('office_email')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!! Form::label('facebook_link', 'Facebook URL') !!}
        {!! Form::text('facebook_link', null, ['class' => 'form-control', 'placeholder' => 'Enter Facebook Link']) !!}
        @error('facebook_link')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('instagram_link', 'Instagram URL') !!}
        {!! Form::text('instagram_link', null, ['class' => 'form-control', 'placeholder' => 'Enter Instagram Link']) !!}
        @error('instagram_link')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('linkedin_link', 'LinkedIn URL') !!}
        {!! Form::text('linkedin_link', null, ['class' => 'form-control', 'placeholder' => 'Enter LinkedIn Link']) !!}
        @error('linkedin_link')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('youtube_link', 'Youtube URL') !!}
        {!! Form::text('youtube_link', null, ['class' => 'form-control', 'placeholder' => 'Enter Youtube Link']) !!}
        @error('youtube_link')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
