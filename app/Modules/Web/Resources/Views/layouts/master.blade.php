<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Trang chủ</title>
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/reset.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('scss/style.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('scss/media.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('slick/slick.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">
		<link href="{{ asset('modules/user/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
		<script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
		<script src="{{ asset('plugins/toastr/sweetalert2@10.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('modules/user/css/common.css') }}">
	</head>
	<body>
		@include('web::layouts.header')

		@yield('content')

		@include('web::layouts.footer')

		@yield('js')
		
		@stack('js')
		
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/script.js') }}"></script>
		<script src="{{ asset('slick/slick.js') }}"></script>
		<script src="{{ asset('js/select2.min.js') }}"></script>
		<script src="{{ asset('modules/user/js/common.js') }}"></script>

		<script>
			@if(Session::has('alert-success'))
				Toast.fire({
					icon: 'success',
					title: "{{ Session::get('alert-success') }}"
				})
			@endif
	
			@if(Session::has('alert-error'))
				Toast.fire({
					icon: 'error',
					title: "{{ Session::get('alert-error') }}"
				})
			@endif
		</script>
	</body>
</html>