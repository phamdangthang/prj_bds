@extends('web::layouts.master')

@section('content')
	<div class="container news-detail-2">
		<div class="row row5 justify-content-center">
			<div class="col-12 pad5 new-detail-2">
				<ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="#"><span itemprop="name">Trang chủ</span></a>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="#"><span itemprop="name">Dự án</span></a>
						<meta itemprop="position" content="2">
					</li>
					<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
						<a itemprop="item"><span itemprop="name">Chi tiết dự án</span></a>
						<meta itemprop="position" content="3">
					</li>
				</ul>

				<h1>THÔNG TIN DỰ ÁN CĂN HỘ BÌNH CHÁNH (CHUNG CƯ ĐỨC KHẢI Q2)</h1>
				<span class="location-news-detail-2">Đường Mai Chí Thọ - <a href="">Xem bản đồ</a></span>

				<div class="slider-news-detail-2">
					<div class="sliders">
						<a href="" class="c-img"><img src="{{ asset('images/news-detail2.jpg') }}" alt=""></a>
						<p>Đường Mai Chí Thọ</p>
					</div>
					<div class="sliders">
						<a href="" class="c-img"><img src="{{ asset('images/news-detail2.jpg') }}" alt=""></a>
						<p>Đường Mai Chí Thọ</p>
					</div>
					<div class="sliders">
						<a href="" class="c-img"><img src="{{ asset('images/news-detail2.jpg') }}" alt=""></a>
						<p>Đường Mai Chí Thọ</p>
					</div>

				</div>

				<div class="info-main-news-detai-2">
					<h3 class="title-cate-news-detail-2">Thông tin chính</h3>
					<div class="d-lg-flex justify-content-lg-around d-md-flex justify-content-md-around d-sm-flex justify-content-sm-around">
						<span class="info-main">Giá: 18 triệu - 20 triệu/m²</span><span class="info-main">Bàn giao: 12/3/2019</span><span class="info-main">Chủ đầu tư: Đức Khải</span>
					</div>
				</div>

				<h2 class="title-cate-news-detail-2 m-top10">MÔ TẢ DỰ ÁN</h2>
				<div class="s-content">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
				</div>

				<h2 class="title-cate-news-detail-2 m-top10">Tiện ích</h2>
				<div class="d-lg-flex justify-content-lg-around extension">
					<span>Bãi đậu xe<i class="fa fa-check" aria-hidden="true"></i></span><span>Bảo vệ 24/7<i class="fa fa-check" aria-hidden="true"></i></span><span>Camera 24/7<i class="fa fa-check" aria-hidden="true"></i></span><span>Hệ thông báo cháy<i class="fa fa-check" aria-hidden="true"></i>
</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 pad5">
				<a class="a-news-detail-2 bg-cam" href="">XEM TIN CẦN BÁN</a>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 pad5">
				<a class="a-news-detail-2 bg-xanh" href="">XEM TIN CHO THUÊ</a>
			</div>
		</div>
	</div>
@endsection