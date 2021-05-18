@extends('web::layouts.master')

@section('content')
    <div class="container" style="margin-top: 30px">
        <form class="row" method="post" action="{{ route('profile.update') }}">
            @csrf
            <div class="col-md-12">
                <b>CẬP NHẬT THÔNG TIN CÁ NHÂN</b>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Họ và tên <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                    {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Số điện thoại <span class="required">*</span></label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone) }}">
                    {!! $errors->first('phone', '<span class="help-block error">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label>Địa chỉ <span class="required">*</span></label>
                    <textarea name="address" class="form-control" rows="5" value="{{ auth()->user()->address }}">{{ old('address', auth()->user()->address) }}</textarea>
                    {!! $errors->first('address', '<span class="help-block error">:message</span>') !!}
                </div>
                <label class="label-change-pass">
                    <input type="checkbox" id="toggleChangePass">
                    <span>Đổi mật khẩu</span>
                </label>
                <div class="box-change-password hidden">
                    <div class="form-group">
                        <label>Mật khẩu hiện tại <span class="required">*</span></label>
                        <input type="password" class="form-control" name="password">
                        {!! $errors->first('password', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu <span class="required">*</span></label>
                        <input type="password" class="form-control" name="confirm_password">
                        {!! $errors->first('confirm_password', '<span class="help-block error">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection