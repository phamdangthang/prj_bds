@extends('web::layouts.master')

@section('content')
	<div class="container cate-news">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-12 posts">
				<h1 class="title-cate text-uppercase">{{ $category->name }}</h1>

				@foreach ($posts as $item)
					<div class="news">
						<div class="row row5">
							<div class="col-lg-5 col-md-5 col-sm-12 col-12 pad5">
								<a href="{{ route('news-detail', ['slug' => $item->slug, 'id' => $item->id]) }}" class="c-img">
									<img src="{{ asset($item->logo ?? 'images/anh-tintuc-1.jpg') }}" alt="">
								</a>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-12 col-12 pad5">
								<h3><a href="{{ route('news-detail', ['slug' => $item->slug, 'id' => $item->id]) }}">{{ $item->name }}</a></h3>
								<span class="date-submitted">{{ date('d/m/Y', strtotime($item->created_at)) }}</span>
								<div class="text-eclipse" style="max-width: 100%; white-space: break-spaces">{!! substr_replace($item->content, "...", 400) !!}</div>
							</div>
						</div>
					</div>
				@endforeach

				{{ $posts->appends(['search' => $search ?? []])->links() }}
			</div>

			<div class="col-lg-3 col-md-12 col-sm-12 col-12 index-right">
				<div class="projects-hot">
					<h3 class="title-index-right">DỰ ÁN ĐANG MỞ BÁN HOT</h3>
					@include('web::includes.project-hot')
				</div>

				<div class="topic-care mt-3">
					<h3 class="title-index-right">CHỦ ĐỀ ĐƯỢC QUAN TÂM</h3>
					<ul>
						@foreach ($categories as $item)
							<li><a href="{{ route('project-of-category', [
									'slug' => $item->slug, 
									'id' => $item->id
									]) }}">{{ $item->name }}</a></li>
						@endforeach
					</ul>
					{{-- <a href="" class="see-all">Xem tất cả >></a> --}}
				</div>

				<a href="" class="qc3"><img src="{{ asset('images/qc3.jpg') }}" alt=""></a>
			</div>
		</div>
	</div>

	@include('web::includes.form-register')
@endsection