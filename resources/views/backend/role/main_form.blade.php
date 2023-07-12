<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@if (empty($rolePermissions))
    <div class="form-group">
        {!! Form::label('permission', 'Permission') !!}
        <br>
        @foreach ($permission as $value)
            {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
            {{ $value->name }}
            <br />
        @endforeach
    </div>
@else
    <div class="form-group">
        <strong>Permission:</strong>
        <br />
        @foreach ($permission as $value)
            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
            {{ $value->name }}
            <br />
        @endforeach
    </div>
@endif
<div class="card-footer">
    {!! Form::submit($button, ['class' => 'btn btn-success']) !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
</div>
</div>
