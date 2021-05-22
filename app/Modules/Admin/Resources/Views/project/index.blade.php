@extends('admin::layouts.master')

@section('title') Dự án @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="{{ route('admin.project.index') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="text" name="search" class="form-control" placeholder="Từ khóa" value="{{ request()->search }}">
                                            </div>
    
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-search"></i>
                                                    <span>Tìm kiếm</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('admin.project.create') }}" class="btn btn-success">
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
                                            <th style="min-width: 110px">Ảnh dự án</th>
                                            <th>Tiêu dự án</th>
                                            <th>Thành phố</th>
                                            <th>Giá bán</th>
                                            <th>Người đăng</th>
                                            <th>Trạng thái</th>
                                            <th style="min-width: 100px">Ngày đăng</th>
                                            <th style="min-width: 155px">Hành đồng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $item)
                                            @php
                                                $images = json_decode($item->images);
                                            @endphp
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <div class="logo-project">
                                                        @if (count($images) > 0)
                                                            <img src="{{ asset($images[0]) }}" alt="">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td style="max-width: 350px">{{ $item->name }}</td>
                                                <td>{{ $item->city->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td style="min-width: 110px">
                                                    @foreach ($projectStatus as $key => $status)
                                                        @if ($item->status === $key)
                                                            <label class="label {{ $status['label'] }}">{{ $status['text'] }}</label>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.project.edit', $item->id) }}" class="btn btn-warning text-white">Sửa</a>
                                                    <a href="{{ route('admin.project.delete', $item->id) }}" class="btn btn-danger text-white">Xóa</a>
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