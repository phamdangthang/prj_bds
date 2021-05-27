@extends('web::layouts.master')

@section('content')
	<div class="container news-detail-2">
		<div class="row row5 justify-content-center">
			<div class="col-12 pad5 new-detail-2">
				<ul class="breadcrumb">
					<li>
						<a href="{{ route('home') }}"><span>Trang chủ</span></a>
					</li>
					<li>
						<a href="{{ route('project-index') }}"><span>Dự án</span></a>
					</li>
					<li>
						<a><span>Chi tiết dự án</span></a>
					</li>
				</ul>

				<h1>{{ $project->name }}</h1>
				<span class="location-news-detail-2">{{ $project->city->name }}</span>

				<div class="slider-news-detail-2">
					@foreach (json_decode($project->images) as $item)
						<div class="sliders">
							<a href="void:javascript(0)" class="c-img">
								<img src="{{ asset($item) }}" alt="">
							</a>
							<p>{{ $project->city->name }}</p>
						</div>
					@endforeach
					<div class="sliders">
						<a href="" class="c-img"><img src="{{ asset('images/news-detail2.jpg') }}" alt=""></a>
						<p>{{ $project->city->name }}</p>
					</div>
				</div>

				<div class="info-main-news-detai-2">
					<h3 class="title-cate-news-detail-2">Thông tin chính</h3>
					<div class="d-lg-flex justify-content-lg-around d-md-flex justify-content-md-around d-sm-flex justify-content-sm-around">
						<span class="info-main">Giá: {{ number_format($project->price) }} VND</span>
						<span class="info-main">Bàn giao: {{ date('d/m/Y', strtotime($project->created_at)) }}</span>
						@if ($project->user)
							<span class="info-main">Chủ đầu tư: {{ $project->user->name }}</span>
						@else
							<span class="info-main">Chủ đầu tư: VINHOMES LAND</span>
						@endif
					</div>
				</div>

				<h2 class="title-cate-news-detail-2 m-top10">MÔ TẢ DỰ ÁN</h2>
				<div class="s-content">
					{!! $project->description !!}
				</div>

				<h2 class="title-cate-news-detail-2 m-top10">Tiện ích</h2>
				<div class="d-lg-flex justify-content-lg-around extension">
					<span>Bãi đậu xe<i class="fa fa-check" aria-hidden="true"></i></span>
					<span>Bảo vệ 24/7<i class="fa fa-check" aria-hidden="true"></i></span>
					<span>Camera 24/7<i class="fa fa-check" aria-hidden="true"></i></span>
					<span>Hệ thông báo cháy<i class="fa fa-check" aria-hidden="true"></i></span>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 pad5">
				@if (auth()->user())
					<a class="a-news-detail-2 bg-cam" href="{{ route('project-news.order', $project->id) }}">ĐẶT MUA</a>
				@else
					<a class="a-news-detail-2 bg-cam" href="javascript:void(0)" onclick="showModalUser('login')">ĐẶT MUA</a>
				@endif
			</div>
		</div>
	</div>
@endsection