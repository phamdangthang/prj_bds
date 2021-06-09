@extends('admin::layouts.master')

@section('title') Khách hàng @endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Khách hàng 
            <small>Chi tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{ route('admin.customer.index') }}">Khách hàng</a></li>
            <li class="active">Chi tiết</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" value="{{ $customer->phone }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="number" name="address" class="form-control" value="{{ $customer->address }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
