@extends('web::layouts.master')

@section('content')
	<div class="container news-detail">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-12 new-detail">
				<h1 class="title-news-detail">{{ $post->name }}</h1>
				<span class="date-submitted">Ngày đăng : {{ date('d/m/Y', strtotime($post->created_at)) }}</span>
				<div class="s-content">
					{!! $post->content !!}
				</div>

				<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=140&layout=button&action=like&size=large&show_faces=false&share=true&height=65&appId" width="140" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

				<h2 class="title-index-right m-top20"><span>TIN MỚI NHẤT</span></h2>
				<ul class="new-many-readers">
					@foreach ($newPost as $item)
						<li>
							<a href="{{ route('news-detail', ['slug' => $item->slug, 'id' => $item->id]) }}">{{ $item->name }}</a>
						</li>
					@endforeach
				</ul>
				{{-- <a href="" class="see-more-news-detail">Xem thêm >></a> --}}
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
							<li><a href="{{ route('news-index') }}">{{ $item->name }}</a></li>
						@endforeach
					</ul>
					<a href="" class="see-all">Xem tất cả >></a>
				</div>

				<a href="" class="qc3"><img src="{{ asset('images/qc3.jpg') }}" alt=""></a>
			</div>
		</div>
	</div>

	@include('web::includes.form-register')
@endsection