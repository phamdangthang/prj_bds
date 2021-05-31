<div class="slider-project-hot">
    @foreach ($projectHot as $item)
        @php
            $images = json_decode($item->images);
            $href=route('project-detail', ['slug' => $item->slug, 'id' => $item->id]);
        @endphp
        <div class="news-slider-project-hot">
            <a href="{{ $href }}" class="c-img"><img src="{{ asset($images['0']) }}" alt=""></a>
            <h4><a href="{{ $href }}">{{ $item->name }} - {{ $item->city->name }}</a></h4>
            <p class="text-eclipse" style="max-height: 60px">{{ $item->short_content ? substr_replace($item->short_content, "...", 43) : null }}</p>
        </div>
    @endforeach
</div>

@foreach ($projectHot as $item)
    @php
        $images = json_decode($item->images);
        $href=route('project-detail', ['slug' => $item->slug, 'id' => $item->id]);
    @endphp
    <div class="row row0 project-hot">
        <div class="col-lg-5 col-md-5 col-sm-5 col-5 pad0">
            <a href="{{ $href }}" class="c-img"><img src="{{ asset($images['0']) }}" alt=""></a>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-7 pad10">
            <h4><a href="{{ $href }}" class="text-eclipse" style="max-width: 135px;">{{ $item->name }} - {{ $item->city->name }}</a></h4>
            <p class="text-eclipse" style="max-height: 56px; max-width: 130px; white-space: break-spaces;">{{ $item->short_content ?? null }}</p>
        </div>
    </div>
@endforeach
