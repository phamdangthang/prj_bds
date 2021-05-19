@extends('web::layouts.master')

@section('content')
	<div class="container post-news">
		<div class="row row5">
			<div class="col pad5">
				<form action="{{ route('post-news.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<p>Lưu ý<span class="required">*</span>: Bạn phải đăng ít nhất 1 ảnh.</p>
					<div class="row row5">
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Danh mục <span class="required">*</span></p>
							<select name="project_id">
								<option value=""></option>
								@foreach ($categories as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Dự án <span class="required">*</span></p>
							<select name="project_id">
								<option value=""></option>
								@foreach ($projects as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Thành phố <span class="required">*</span></p>
							<select name="city_id">
								<option value=""></option>
								@foreach ($cities as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 pad5">
							<p>Địa chỉ chi tiết <span class="required">*</span></p>
							<input type="text" name="{{ old('address') }}" placeholder="Địa chỉ số 243 Phạm Văn Đồng">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Giá (VNĐ) <span class="required">*</span></p>
							<input type="text" name="price" value="{{ old('price') }}" placeholder="100.000">
							<span class="node">Lưu ý : Tin rao để mệnh giá tiền Việt Nam đồng</span>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-12 pad5">
							<p>Hướng dẫn</p>
							<textarea name="guide" value="{{ old('guide') }}" rows="2" placeholder="Giới thiệu chung về bất động sản của bạn . Ví dụ : khu nhà có vị trí thuận lợi : Gần  công viên, trường học... Tổng diện tích 52m2 đường đi ô tô vào tận cổng">{{ old('guide') }}</textarea>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Tình trạng BĐS <span class="required">*</span></p>
							<select name="usage_status">
								<option value=""></option>
								<option value="{{ NEW_TO_USE }}">Mới xây</option>
								<option value="{{ USED_ONE_YEAR }}">Đã sử dụng 1 năm</option>
								<option value="{{ USED_TWO_YEAR }}">Đã sử dụng 2 năm</option>
								<option value="{{ USED_THREE_YEAR }}">Đã sử dụng 3 năm</option>
							</select>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 pad5">
							<p>Diện tích (m²) <span class="required">*</span></p>
							<input type="text" name="acreage" value="{{ old('acreage') }}" placeholder="Nhập diện tích">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<div class="row row5">
								<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
									<p>Số phòng ngủ <span class="required">*</span></p>
									<div class="minus-plus">
										<span class="minus-bedroom" aria-hidden="true">-</span>
										<input type="number" value="0" name="number_of_bedrooms" class="inputnumber-bedroom">
										<span class="plus-bedroom" aria-hidden="true">+</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
									<p>Số nhà vệ sinh <span class="required">*</span></p>
									<div class="minus-plus">
										<span class="minus-wc" aria-hidden="true">-</span>
										<input type="number" name="number_of_toilets" value="0" class="inputnumber-wc">
										<span class="plus-wc" aria-hidden="true">+</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Tiêu đề  <span class="required">*</span></p>
							<input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tiêu đề">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Mô tả chi tiết  <span class="required">*</span></p>
							<textarea name="description" rows="4" placeholder="Nhập mô tả chi tiết"></textarea>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Hướng cửa <span class="required">*</span></p>
							<select name="door_direction">
								<option value=""></option>
								<option value="{{ EAST }}">Đông</option>
								<option value="{{ WEST }}">Tây</option>
								<option value="{{ SOUTH }}">Nam</option>
								<option value="{{ NORTH }}">Bắc</option>
								<option value="{{ SOUTHEAST }}">Đông Nam</option>
								<option value="{{ NORTHEAST }}">Đông Bắc</option>
								<option value="{{ SOUTHWEST }}">Tây Nam</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Hướng ban công <span class="required">*</span></p>
							<select name="balcony_direction">
								<option value=""></option>
								<option value="{{ EAST }}">Đông</option>
								<option value="{{ WEST }}">Tây</option>
								<option value="{{ SOUTH }}">Nam</option>
								<option value="{{ NORTH }}">Bắc</option>
								<option value="{{ SOUTHEAST }}">Đông Nam</option>
								<option value="{{ NORTHEAST }}">Đông Bắc</option>
								<option value="{{ SOUTHWEST }}">Tây Nam</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Tầng <span class="required">*</span></p>
							<input type="text" name="floor" value="{{ old('floor') }}" placeholder="Nhập tầng">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12 pad5">
							<p>Số hiệu căn hộ <span class="required">*</span></p>
							<input type="text" name="apartment_number" value="{{ old('apartment_number') }}" placeholder="Nhập số hiệu căn hộ">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Thông tin chủ nhà</p>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Tên <span class="required">*</span></p>
							<input type="text" value="{{ auth()->user()->name ?? null }}" placeholder="Nhập tên" readonly>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Email <span class="required">*</span></p>
							<input type="text" value="{{ auth()->user()->email ?? null }}" placeholder="Nhập Email" readonly>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 pad5">
							<p>Số điện thoại <span class="required">*</span></p>
							<input type="text" value="{{ auth()->user()->phone ?? null }}" placeholder="Nhập số điện thoại" readonly>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<p>Ghi chú</p>
							<textarea name="note" rows="3" placeholder="Nhập ghi chú"></textarea>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<div class="form-group">
								<p>Hình ảnh căn hộ <span class="required">*</span></p>
								<div class="list-img">
									@foreach ($images as $key => $img)
										@if ($img)
											<div class="item">
												<i class="fe-x icon-remove"></i>
												<label>
													<div class="label-mask"></div>
			
													<i class="fe-image icon-plus cursor-pointer"></i>
													<img src="{{ asset($img) }}" class="img-preview">
													<input accept="image/*" type="file" class="change_input d-none" name="images[{{ $key }}]">
													<input type="hidden" name="images[{{ $key }}]" value="{{ $img }}">
												</label>
											</div>
										@else
											<div class="item">
												<i class="fe-x icon-remove d-none"></i>
												<label>
													<div class="label-mask"></div>
			
													<i class="fe-image icon-plus cursor-pointer"></i>
													<img src="" class="img-preview d-none">
													<input accept="image/*" type="file" class="change_input d-none" name="images[{{ $key }}]">
												</label>
											</div>
										@endif
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12 pad5">
							<button type="submit">ĐĂNG TIN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	@include('web::includes.form-register')
@endsection