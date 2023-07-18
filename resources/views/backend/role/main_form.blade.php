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
        <div class="row">
            @foreach ($permission as $value)
                <div class="col-md-3">
                    {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                    {{ $value->name }}
                    <br />
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="form-group">
        {!! Form::label('permission', 'Permission') !!}
        <br>
        <div class="row">
            @foreach ($permission as $value)
                <div class="col-md-3">
                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                    {{ $value->name }}
                </div>
            @endforeach
        </div>
    </div>

@endif
<div class="card-footer">
    {!! Form::submit($button, ['class' => 'btn btn-success']) !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
</div>
</div>
