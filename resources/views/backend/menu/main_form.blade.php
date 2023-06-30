<div class="card-body">
    <div class="form-group">
        {!!Form::label('type','Select Type')!!}
        {{ Form::select('type', ['1' => 'Header', '2' => 'Footer'], null, ['class' => 'form-control','placeholder'=>'Select Type']) }}

        @error('title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!! Form::label('parent_id', 'Parent Menu') !!}
        {!! Form::select('parent_id', ['' => 'Select the Menu'] + buildMenuOptions($menuItems), null, ['class' => 'form-control select2']) !!}
    </div>
    <?php
    function buildMenuOptions($menuItems, $indentation = 0) {
        $options = [];

        foreach ($menuItems as $menuItem) {
            $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $indentation);

            $options[$menuItem['id']] = $indent . $menuItem['title'];

            if (isset($menuItem['children'])) {
                $options += buildMenuOptions($menuItem['children'], $indentation + 1);
            }
        }

        return $options;
    }
    ?>
    <div class="form-group">
        {!!Form::label('title','Menu Title')!!}
        {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Title'])!!}
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
        {!!Form::label('order','Order')!!}
        {!!Form::number ('order',null,['class'=> 'form-control','placeholder'=>'Order'])!!}
        @error('order')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('status','Status')!!} <br>
        <input type="radio" name="status" value="1"> Enable<br>
        <input type="radio" name="status" value="0" checked> Disable<br>
    </div>
    @error('status')
    <span class="text-danger">{{$message}}</span> @enderror

</div>
<div class="card-footer">
    {!!Form::submit($button ,['class'=>'btn btn-success'])!!}
    {!!Form::reset('Clear',['class'=>'btn btn-danger'])!!} <br>
</div>
