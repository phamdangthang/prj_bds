<div class="slider-banner">
	<a href="" class="c-img"><img src="{{ asset('images/banner-1.jpg') }}" alt=""></a>
	<a href="" class="c-img"><img src="{{ asset('images/banner-2.jpg') }}" alt=""></a>
</div>

<header class="header">
	<div class="container">
		<div class="row align-items-center justify-content-lg-center">
			<div class="col-lg-2">
				<a href=""><img src="{{ asset('images/logo.png') }}" alt=""></a>
			</div>
			<div class="col-lg-6 menu">
				<ul>
					<li><a href="">TRANG CHỦ</a></li>
					<li><a href="">MUA BÁN</a>
						<ul>
							<li><a href="">Bán căn hộ chung cư</a></li>
							<li><a href="">Bán nhà riêng</a></li>
							<li><a href="">Bán nhà biệt thự liền kề</a></li>
							<li><a href="">Bán nhà mặt phố</a></li>
							<li><a href="">Bán đất nền dự án</a></li>
							<li><a href="">Bán trang trại, khu nghỉ dưỡng</a></li>
							<li><a href="">Bán kho nhà xưởng</a></li>
							<li><a href="">Bán loại bất động sản khác</a></li>
						</ul>
					</li>
					<li><a href="">DỰ ÁN</a>
						<ul>
							<li><a href="">Bán căn hộ chung cư</a></li>
							<li><a href="">Bán nhà riêng</a></li>
							<li><a href="">Bán nhà biệt thự liền kề</a></li>
							<li><a href="">Bán nhà mặt phố</a></li>
							<li><a href="">Bán đất nền dự án</a></li>
							<li><a href="">Bán trang trại, khu nghỉ dưỡng</a></li>
							<li><a href="">Bán kho nhà xưởng</a></li>
							<li><a href="">Bán loại bất động sản khác</a></li>
						</ul>
					</li>
					<li><a href="">TIN TỨC</a></li>
				</ul>
			</div>
			<div class="col-lg-auto header-right">

				@if (auth()->user())
					<a href="{{ route('project-news') }}" class="post-news">
						<img src="{{ asset('images/dangtin2.png') }}" alt="">
						<span>ĐĂNG TIN</span>
					</a>
				@else
					<a href="javascript:void(0)" class="post-news" onclick="showModalUser('login')">
						<img src="{{ asset('images/dangtin2.png') }}" alt="">
						<span>ĐĂNG TIN</span>
					</a>
				@endif
				
				<div class="icon-header">
					@if (auth()->user())
						<a href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
						<a href="{{ route('logout') }}">
							<img src="{{ asset('images/icon2.png') }}" alt="">
						</a>
					@else
						<a href="javascript:void(0)" onclick="showModalUser('login')">
							<img src="{{ asset('images/icon1.png') }}" alt="">
						</a>
					@endif
					
				</div>
				<div class="language">
					<a href=""><img src="{{ asset('images/vn.jpg') }}" alt=""></a>
					<a href=""><img src="{{ asset('images/usa.jpg') }}" alt=""></a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 filter">
				<h2>Wikihouse mua bán nhà trực tuyến</h2>
				<!-- Nav pills -->
				<div class="row justify-content-lg-center">
					<div class="col-lg-auto">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#muaban">MUA BÁN</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#duan">DỰ ÁN</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="tab-content row m-top20">
					<div class="tab-pane active tab-purchase col-lg-12" id="muaban">
						<form action="#">
							<input type="text" placeholder="Tìm kiếm theo tên dự án">
							<a href=""><img src="{{ asset('images/timkiem.png') }}" alt=""></a>
							<div class="row m-top20">
								<div class="col-lg filter-by">
									<select name="" id="" class="select2">
										<option value="">Loại hình BĐS</option>
										<option value="">Loại hình BĐS</option>
									</select>
								</div>
								<div class="col-lg filter-by">
									<select name="" id="" class="select2">
										<option value="">Chọn Quận/ Huyện</option>
										<option value="">Chọn Quận/ Huyện</option>
									</select>
								</div>
								<div class="col-lg filter-by">
									<select name="" id="" class="select2">
										<option value="">Chọn dự án</option>
										<option value="">Chọn dự án</option>
									</select>
								</div>
								<div class="col-lg">
									<a class="btn-filter">
										<img src="{{ asset('images/icon-filter.png') }}" alt="">
										<span>TÌM NGAY</span>
									</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade tab-lease col-lg-12" id="chothue">
					</div>
					<div class="tab-pane fade tab-project col-lg-12" id="duan">
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<header class="header-mobile">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-2 col-sm-2 col-2">
				<button class="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
			</div>
			<div class="col-md-8 col-sm-8 col-7">
				<a href="" class="logo-mb"><img src="{{ asset('images/logo.png') }}" alt=""></a>
			</div>

			<div class="col-md-2 col-sm-2 col-3 header-icon">
				<a href=""><img src="{{ asset('images/icon1.png') }}" alt=""></a>
				<a href=""><img src="{{ asset('images/icon2.png') }}" alt=""></a>
			</div>
		</div>

		<div class="row">
			<div class="col filter">
				<h2>Wikihouse mua bán nhà trực tuyến</h2>

				<div class="row justify-content-center">
					<div class="col-auto">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#muaban">MUA BÁN</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#chothue">CHO THUÊ</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#duan">DỰ ÁN</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="tab-content row">
					<div class="tab-pane active tab-purchase col" id="muaban">
						<form action="#">
							<input type="text" placeholder="Tìm kiếm theo tên dự án">
							<a href=""><img src="{{ asset('images/timkiem.png') }}" alt=""></a>
							<a class="filter-advanced" data-toggle="modal" data-target="#loc-header"><img src="{{ asset('images/icon-filter.png') }}" alt="">LỌC NÂNG CAO</a>
						</form>
					</div>
					<div class="tab-pane fade tab-lease col" id="chothue">
						
					</div>
					<div class="tab-pane fade tab-project col" id="duan">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="menu-mb">
	<button class="close"><i class="fa fa-close"></i></button>

	<a href="" class="logo-mb"><img src="{{ asset('images/logo.png') }}" alt=""></a>
	
	<div class="header-right">
		<a href="" class="post-news"><img src="{{ asset('images/dangtin2.png') }}" alt=""><span>ĐĂNG TIN</span></a>
		<div class="icon-header">
			<a href=""><img src="{{ asset('images/icon-mb1.png') }}" alt=""></a>
			<a href=""><img src="{{ asset('images/icon-mb2.png') }}" alt=""></a>
		</div>
		<div class="language">
			<a href=""><img src="{{ asset('images/vn.jpg') }}" alt=""></a>
			<a href=""><img src="{{ asset('images/usa.jpg') }}" alt=""></a>
		</div>
	</div>
	<ul>
		<li><a href="#" title="">TRANG CHỦ</a></li>
		<li><a href="#" title="">MUA BÁN</a>
			<ul>
				<li><a href="#" title="">Bán căn hộ chung cư</a></li>
				<li><a href="#" title="">Bán nhà riêng</a></li>
				<li><a href="#" title="">Bán nhà biệt thự liền kề</a></li>
				<li><a href="#" title="">Bán nhà mặt phố</a></li>
				<li><a href="#" title="">Bán đất nền dự án</a></li>
				<li><a href="#" title="">Bán trang trại, khu nghỉ dưỡng</a></li>
				<li><a href="#" title="">Bán kho nhà xưởng</a></li>
				<li><a href="#" title="">Bán loại bất động sản khác</a></li>
			</ul>
		</li>
		<li><a href="#" title="">CHO THUÊ</a>
			<ul>
				<li><a href="#" title="">Bán căn hộ chung cư</a></li>
				<li><a href="#" title="">Bán nhà riêng</a></li>
				<li><a href="#" title="">Bán nhà biệt thự liền kề</a></li>
				<li><a href="#" title="">Bán nhà mặt phố</a></li>
				<li><a href="#" title="">Bán đất nền dự án</a></li>
				<li><a href="#" title="">Bán trang trại, khu nghỉ dưỡng</a></li>
				<li><a href="#" title="">Bán kho nhà xưởng</a></li>
				<li><a href="#" title="">Bán loại bất động sản khác</a></li>
			</ul>
		</li>
		<li><a href="#" title="">DỰ ÁN</a>
			<ul>
				<li><a href="#" title="">Bán căn hộ chung cư</a></li>
				<li><a href="#" title="">Bán nhà riêng</a></li>
				<li><a href="#" title="">Bán nhà biệt thự liền kề</a></li>
				<li><a href="#" title="">Bán nhà mặt phố</a></li>
				<li><a href="#" title="">Bán đất nền dự án</a></li>
				<li><a href="#" title="">Bán trang trại, khu nghỉ dưỡng</a></li>
				<li><a href="#" title="">Bán kho nhà xưởng</a></li>
				<li><a href="#" title="">Bán loại bất động sản khác</a></li>
			</ul>
		</li>
		<li><a href="#" title="">TIN TỨC</a></li>
	</ul>
	<button class="btn-filter"><img src="{{ asset('images/icon-filter.png') }}" alt="">LỌC NÂNG CAO</button>
</div>

@include('web::user.includes.modal-register-login')