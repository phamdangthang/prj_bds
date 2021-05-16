<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trang chủ</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('scss/style.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('scss/media.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('slick/slick.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" type="text/css">
</head>
<body>
	@include('web::layouts.header')

	@yield('content')

	@include('web::layouts.footer')

	@yield('js')
	@stack('js')
	
	<script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script src="{{ asset('slick/slick.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
</body>
</html>