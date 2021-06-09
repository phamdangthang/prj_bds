@extends('admin::layouts.master')

@section('title') Khách hàng @endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Khách hàng
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Khách hàng</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('admin.customer.index') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="text" name="search" class="form-control" placeholder="Từ khóa" value="{{ request()->search }}">
                                            </div>
    
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-search"></i>
                                                    <span>Tìm kiếm</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th style="min-width: 100px">Ngày tham gia</th>
                                            <th style="min-width: 155px">Hành đồng</th>
                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        @foreach ($customers as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.customer.view', $item->id) }}" class="btn btn-warning pull-left" style="margin-right: 3px;">
                                                    <span>Xem thông tin</span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $customers->appends(['search' => $search])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection