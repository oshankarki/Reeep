<select name="menu">
    @foreach($menuItems as $menuItem)
        <option value="{{ $menuItem->id }}">{{ $menuItem->title }}</option>
        @if(isset($menuItem->children))
            @foreach($menuItem->children as $childItem)
                <option value="{{ $childItem->id }}"> &nbsp;  {{ $childItem->title }}</option>
                @if(isset($childItem->children))
                    @foreach($childItem->children as $grandchildItem)
                        <option value="{{ $grandchildItem->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $grandchildItem->title }}</option>
                    @endforeach
                @endif
            @endforeach
        @endif
    @endforeach
</select>
