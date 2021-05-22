@extends('admin::layouts.master')

@section('title') Tin tức @endsection

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Thành viên
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thành viên</li>
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
                                    <form action="{{ route('admin.blog.index') }}" method="GET" class="form-horizontal">
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
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus"></i>
                                        <span>Tạo mới</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="min-width: 110px">Ảnh đại diện</th>
                                            <th>Tiêu đề</th>
                                            <th>Slug</th>
                                            <th>Người đăng</th>
                                            <th style="min-width: 100px">Ngày tạo</th>
                                            <th style="min-width: 155px">Hành đồng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <div class="logo-project">
                                                        @if ($item->logo)
                                                            <img src="{{ asset($item->logo) }}" alt="">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>{{ $item->admin->name }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.blog.edit', $item->id) }}" class="btn btn-warning text-white">Sửa</a>
                                                    <a href="{{ route('admin.blog.delete', $item->id) }}" class="btn btn-danger text-white">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $result->appends(['search' => $search])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection