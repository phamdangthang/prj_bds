@extends('web::layouts.master')

@section('content')
	<div class="container news-latest">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="cate">
					<h1 class="title-cate">DỰ ÁN MỚI NHẤT</h1>
				</div>

				<a href="" class="qc mt-3">
					<img src="{{ asset('images/qc1.jpg') }}" alt="">
				</a>
				@foreach ($projects as $item)
					@include('web::includes.project-home', ['item' => $item])
				@endforeach

				{{ $projects->appends([
					'name' => $request->name,
					'usage_status' => $request->usage_status,
					'city_id' => $request->city_id,
					'acreage' => $request->acreage,
				])->links() }}
			</div>

			<div class="col-lg-3 col-md-12 col-sm-12 col-12 index-right">
				<a href="" class="qc2" data-toggle="modal" data-target="#kygui"><img src="{{ asset('images/qc2.jpg') }}" alt=""></a>

				<!-- The Modal -->
				<div class="modal" id="kygui">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="container">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
										<h2>KÝ GỬI CĂN HỘ</h2>
										<p>* Để nhận được nhiều ưu đãi nhất bạn vui lòng đăng ký thông tin phía dưới :</p>
										<form action="#">
											<input type="text" placeholder="Họ và tên">
											<input type="email" placeholder="Email">
											<input type="text" placeholder="Số điện thoại">
											<textarea name="" id="" rows="3" placeholder="Nội dung"></textarea>
											<button>ĐĂNG KÝ NGAY</button>
										</form>
									</div>
									<button type="button" class="close" data-dismiss="modal">×</button>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="order-product">
					<h3 class="title-index-right">ĐẶT HÀNG SẢN PHẨM</h3>
					@include('web::includes.form-order')
				</div> --}}

				<div class="area">
					<h3 class="title-index-right">BÁN CĂN HỘ TẠI HÀ NỘI</h3>
					@include('web::includes.sale-address')
				</div>

				<div class="projects-hot">
					<h3 class="title-index-right">DỰ ÁN ĐANG MỞ BÁN HOT</h3>
					@include('web::includes.project-hot')
				</div>

				<div class="news-highlight">
					<h3 class="title-index-right">TIN NỔI BẬT</h3>

					@include('web::post.new')
				</div>

				<a href="" class="qc3"><img src="{{ asset('images/qc3.jpg') }}" alt=""></a>
			</div>
		</div>
	</div>

	@if (!auth()->user())
		@include('web::includes.form-register')
	@endif
@endsection