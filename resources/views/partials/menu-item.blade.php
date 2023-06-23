@foreach($menuItems as $menuItem)
    <option value="{{ $menuItem['id'] }}">
        @php echo str_repeat('&nbsp;', $indentation * 4);
        @endphp
        {{ $menuItem['title'] }}
    </option>
    @if(isset($menuItem['children']))
        @include('partials.menu-item', ['menuItems' => $menuItem['children'], 'indentation' => $indentation + 1])
    @endif
@endforeach
