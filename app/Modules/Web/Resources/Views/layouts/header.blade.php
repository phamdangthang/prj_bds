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
					<li><a href="">CHO THUÊ</a>
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
				<a href="" class="post-news"><img src="{{ asset('images/dangtin2.png') }}" alt=""><span>ĐĂNG TIN</span></a>
				<div class="icon-header">
					<a href=""><img src="{{ asset('images/icon1.png') }}" alt=""></a>
					<a href=""><img src="{{ asset('images/icon2.png') }}" alt=""></a>
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
								<a class="nav-link" data-toggle="pill" href="#chothue">CHO THUÊ</a>
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
									<a class="btn-filter" data-toggle="modal" data-target="#loc-header"><img src="{{ asset('images/icon-filter.png') }}" alt="">LỌC NÂNG CAO</a>
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
<!-- The Modal -->
<div class="modal modal-filter-header" id="loc-header">
	<div class="modal-dialog modal-lg">
		<div class="modal-content container">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<form action="#">
				<h3>LỌC NÂNG CAO</h3>
				<div class="row row5">
					<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
						<h6>Loại hình BDS :</h6>
						<select name="" id=""">
							<option value="">Loại hình BDS 1</option>
							<option value="">Loại hình BDS 2</option>
							<option value="">Loại hình BDS 3</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
						<h6>Chọn Quận/Huyện :</h6>
						<select name="" id="">
							<option value="">Gia Lâm</option>
							<option value="">Long Biên</option>
							<option value="">Hai Bà Trưng</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
						<h6>Chọn dự án :</h6>
						<select name="" id="">
							<option value="">Dự án 1</option>
							<option value="">Dự án 2</option>
							<option value="">Dự án 3</option>
						</select>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
						<h6>Khoảng giá</h6>
						<div class="row row5">
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="nhohon800tr" value="value">
								<label class="chon" for="nhohon800tr">Nhỏ hơn 800 triệu</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="800tr-1,5ty" value="value">
								<label class="chon" for="800tr-1,5ty">800tr - 1,5 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="1,5-2ty" value="value">
								<label class="chon" for="1,5-2ty">1,5 đến 2 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="2ty-2,5ty" value="value">
								<label class="chon" for="2ty-2,5ty">2 tỷ - 2,5 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="2,5-3ty" value="value">
								<label class="chon" for="2,5-3ty">2,5 - 3 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="3ty-5ty" value="value">
								<label class="chon" for="3ty-5ty">3 tỷ - 5 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="5ty-10ty" value="value">
								<label class="chon" for="5ty-10ty">5 tỷ - 10 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="10ty-20ty" value="value">
								<label class="chon" for="10ty-20ty">10 tỷ - 20 tỷ</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="tren20ty" value="value">
								<label class="chon" for="tren20ty">Trên 20 tỷ</label>
							</div>
						</div>
						<h6>Số phòng ngủ :</h6>
						<div class="row row5">
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="1phong" value="value">
								<label class="chon" for="1phong">1 phòng</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="2phong" value="value">
								<label class="chon" for="2phong">2 phòng</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="3phong" value="value">
								<label class="chon" for="3phong">3 phòng</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="4phong" value="value">
								<label class="chon" for="4phong">4 phòng</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="5phong" value="value">
								<label class="chon" for="5phong">5 phòng</label>
							</div>
						</div>
						<h6>Diện tích :</h6>
						<div class="row row5">
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="nhohon50m" value="value">
								<label class="chon" for="nhohon50m"><50m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="50-70m" value="value">
								<label class="chon" for="50-70m">50 - 70m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="70-80m" value="value">
								<label class="chon" for="70-80m">70 - 80m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="80-100m" value="value">
								<label class="chon" for="80-100m">80 - 100m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="100-150m" value="value">
								<label class="chon" for="100-150m">100 - 150m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="150-200m" value="value">
								<label class="chon" for="150-200m">150 - 200m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="250-500m" value="value">
								<label class="chon" for="250-500m">250 - 500m²</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="tren500m" value="value">
								<label class="chon" for="tren500m">>500m²</label>
							</div>
						</div>
						<h6>Khoảng tầng :</h6>
						<div class="row row5">
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="duoi10" value="value">
								<label class="chon" for="duoi10">Dưới 10</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="10-20" value="value">
								<label class="chon" for="10-20">10 - 20</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="20-30" value="value">
								<label class="chon" for="20-30">20 - 30</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="30-40" value="value">
								<label class="chon" for="30-40">30 - 40</label>
							</div>
							<div class="col-20 col-md-4 col-sm-4 col-4 pad5">
								<input class="input-for-label" type="checkbox" name="khoanggia" id="tren40" value="value">
								<label class="chon" for="tren40">Trên 40</label>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-12 pad5">
						<h6>Hướng cửa chính :</h6>
						<select name="" id="">
							<option value="">Chọn hướng cửa chính</option>
							<option value="">Chọn hướng cửa chính</option>
							<option value="">Chọn hướng cửa chính</option>
						</select>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-12 pad5">
						<h6>Chọn hướng ban công :</h6>
						<select name="" id="">
							<option value="">Chọn hướng ban công</option>
							<option value="">Chọn hướng ban công</option>
							<option value="">Chọn hướng ban công</option>
						</select>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6 pad5">
						<h6>Blog :</h6>
						<input type="text" placeholder="Nhập Blog">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6 pad5">
						<h6>Tầng :</h6>
						<input type="text" placeholder="Nhập tầng">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6 pad5">
						<h6>Số hiệu căn hộ :</h6>
						<input type="text" placeholder="Nhập số hiệu căn hộ">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-6 pad5">
						<h6>Diện tích :</h6>
						<input type="text" placeholder="Nhập diện tích">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 pad5">
						<button class="filter-out">BỎ LỌC</button>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 pad5">
						<button class="apply">ÁP DỤNG</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

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