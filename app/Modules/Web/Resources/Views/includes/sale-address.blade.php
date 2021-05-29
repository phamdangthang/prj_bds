<ul>
    @foreach ($groupCity as $item)
        <li><a href="">{{ $item['name'] }} <span>({{ $item['total'] }})</span></a></li> <br />
    @endforeach
</ul>