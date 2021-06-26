@foreach ($hot_news as $news)
    <div class="row row0 new-highlight">
        <div class="col-lg-5 col-md-5 col-sm-5 col-5 pad0">
            <a href="{{ route('news-detail', ['slug' => $news->slug, 'id' => $news->id]) }}" class="c-img"><img src="{{ asset($news->logo) }}" alt=""></a>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-7 pad-l-10">
            <p><a href="{{ route('news-detail', ['slug' => $news->slug, 'id' => $news->id]) }}" class="text-eclipse" style="max-width: 135px;" title="{{ $news->name }}">{{ $news->name }}</a></p>
            <span>{{ $news->created_at }}</span>
        </div>
    </div>
@endforeach