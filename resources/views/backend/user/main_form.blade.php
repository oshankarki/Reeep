<div class="form-group">
    {!!Form::label('name','Name')!!}
    {!!Form::text ('name',null,['class'=> 'form-control','placeholder'=>'Name'])!!}
    @error('name')
    <span class="text-danger">{{$message}}</span> @enderror
</div>
<div class="form-group">
    {!!Form::label('email','Email')!!}
    {!!Form::text ('email',null,['class'=> 'form-control','placeholder'=>'Email'])!!}
    @error('email')
    <span class="text-danger">{{$message}}</span> @enderror
</div>
<div class="form-group">
    {!!Form::label('password','Password')!!}
    {!!Form::password ('password',['class'=> 'form-control','placeholder'=>'Password'])!!}
    @error('password')
    <span class="text-danger">{{$message}}</span> @enderror
</div>
<div class="form-group">
    {!!Form::label('confirm-password','Confirm Password')!!}
    {!!Form::password ('confirm-password',['class'=> 'form-control','placeholder'=>'Password'])!!}
    @error('confirm-password')
    <span class="text-danger">{{$message}}</span> @enderror
</div>
@if(empty($userRole))
<div class="form-group">
    {!!Form::label('roles','Role')!!}
    {!! Form::select('roles[]', $roles,[], ['class' => 'form-control select2','multiple']) !!}
    @error('roles')
    <span class="text-danger">{{$message}}</span> @enderror
</div>
@else
    <div class="form-group">
        {!!Form::label('roles','Role')!!}
        {!! Form::select('roles[]', $roles,$userRole, ['class' => 'form-control select2','multiple']) !!}
        @error('roles')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
@endif
<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
