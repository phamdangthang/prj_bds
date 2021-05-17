@extends('web::layouts.master')

@section('content')
	<div class="container post-news">
		<div class="row row5">
			<div class="col pad5">
				<form action="#">
					<p>Lưu ý*: Bạn phải đăng ít nhất 1 ảnh.</p>
					<div class="row row5">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Danh mục</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">xyz</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Dự án</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">xyz</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Dự án</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">xyz</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Quận huyện</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">xyz</option>
							</select>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 pad5">
							<p>Địa chỉ chi tiết <span>*</span></p>
							<input type="text" placeholder="Địa chỉ số 243 Phạm Văn Đồng">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Giá (VNĐ) <span>*</span></p>
							<input type="text" placeholder="100.000">
							<span class="node">Lưu ý : Tin rao để mệnh giá tiền Việt Nam đồng</span>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 pad5">
							<p>Hướng dẫn</p>
							<textarea name="" id="" rows="2" placeholder="Giới thiệu chung về bất động sản của bạn . Ví dụ : khu nhà có vị trí thuận lợi : Gần  công viên, trường học... Tổng diện tích 52m2 đường đi ô tô vào tận cổng"></textarea>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Tình trạng BĐS</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">xyz</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Diện tích (m²) <span>*</span></p>
							<input type="text" placeholder="Nhập diện tích">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<div class="row row5">
								<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
									<p>Số phòng ngủ</p>
									<div class="minus-plus">
										<span class="minus-bedroom" aria-hidden="true">-</span>
										<input type="number" value="0" class="inputnumber-bedroom">
										<span class="plus-bedroom" aria-hidden="true">+</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
									<p>Số nhà vệ sinh</p>
									<div class="minus-plus">
										<span class="minus-wc" aria-hidden="true">-</span>
										<input type="number" value="0" class="inputnumber-wc">
										<span class="plus-wc" aria-hidden="true">+</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Tiêu đề <span>*</span></p>
							<input type="text" placeholder="Nhập tiêu đề">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Mô tả chi tiết <span>*</span></p>
							<textarea name="" id="" rows="4" placeholder="Nhập mô tả chi tiết"></textarea>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Hướng cửa</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">abc</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Hướng ban công</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">abc</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Dự án</p>
							<select name="" id="">
								<option value="">abc</option>
								<option value="">abc</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Block</p>
							<input type="text" placeholder="Nhập Block">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Tầng</p>
							<input type="text" placeholder="Nhập tầng">
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Số hiệu căn hộ</p>
							<input type="text" placeholder="Nhập số hiệu căn hộ">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Thông tin chủ nhà</p>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Tên</p>
							<input type="text" placeholder="Nhập tên">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Số điện thoại</p>
							<input type="text" placeholder="Nhập số điện thoại">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Email</p>
							<input type="text" placeholder="Nhập Email">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Ghi chú</p>
							<textarea name="" id="" rows="3" placeholder="Nhập ghi chú"></textarea>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<button>ĐĂNG TIN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="register">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 col-12 qc4">
					<a href=""><img src="{{ asset('images/dky1.jpg') }}" alt=""></a>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-12 form-register">
					<h2>ĐĂNG KÝ NHẬN DỰ ÁN HOT</h2>
					<p>* Để nhận đượcie nều ưu đãi nhất bạn vui lòng đăng ký thông tin phía dưới :</p>
					<form action="#">
						<div class="row">
							<div class="col-lg-6">
								<input type="text" placeholder="Họ và tên">
								<input type="email" placeholder="Email">
								<input type="text" placeholder="Số điện thoại">
							</div>
							<div class="col-lg-6">
								<textarea name="" id="" rows="3" placeholder="Nội dung"></textarea>
								<button class="register-now">ĐĂNG KÝ NGAY</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection