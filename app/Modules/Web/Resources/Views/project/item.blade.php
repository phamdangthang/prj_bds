<div class="new-project">
    <div class="row row5">
        @php
            $images = json_decode($item->images);
        @endphp
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 pad5">
            @if (count($images) > 0)
                @if (count($images) > 1)
                    <div class="row row5">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 pad5">
                            <a href="" class="c-img img-larg hv-scale">
                                <img src="{{ asset($images['0']) }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 pad5">
                            @foreach ($images as $index => $image)
                                @if ($index > 0)
                                    <a href="" class="c-img img-small hv-light">
                                        <img src="{{ asset($image) }}" alt="">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row row5">
                        <div class="col-md-12 pad5">
                            <a href="" class="c-img img-larg hv-scale">
                                <img src="{{ asset($images['0']) }}" alt="">
                            </a>
                        </div>
                    </div>
                @endif
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 content-new-project">
            <h3><a href="">{{ $item->name }}</a></h3>
            <span class="year">Năm bàn giao : <span>{{ date('Y', strtotime($item->created_at)) }}</span></span>
            <span class="county">Thành phố : {{ $item->city->name }}</span>
            <div class="description">{!! $item->description !!}</div> 
        </div>
    </div>
</div>