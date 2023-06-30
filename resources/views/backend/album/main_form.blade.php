
    <div class="form-group">
        {!!Form::label('title',' Title')!!}
        {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Album Title'])!!}
        @error('title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
