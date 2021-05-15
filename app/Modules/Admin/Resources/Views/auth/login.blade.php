
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('modules/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/css/common.css') }}" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <span>Đăng nhập để truy cập trang quản trị</span>
                        </div>
                        @if (Session::has('login-error'))
                            <div class="alert alert-danger">
                                {{ Session::get('login-error') }}
                            </div>
                        @endif
                        <div class="login-form">
                            <form method="POST" action="{{ route('admin.signIn') }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    {!! $errors->first('email', '<span class="help-block required">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Mật khẩu">
                                    {!! $errors->first('password', '<span class="help-block required">:message</span>') !!}
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Ghi nhớ
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('modules/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
</body>

</html>
<!-- end document-->