@extends('admin::layouts.master')

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
                                                <select name="type" class="form-control" placeholder="Loại danh mục">
                                                    <option value=""></option>
                                                    <option value="{{ PROJECT }}" @if(request()->type != '' && request()->type == PROJECT) selected @endif>Dự án</option>
                                                    <option value="{{ NEWS }}" @if(request()->type == NEWS) selected @endif>Tin tức</option>
                                                </select>
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
                                            <th>Tiêu đề</th>
                                            <th>Slug</th>
                                            <th>Loại danh mục</th>
                                            <th style="min-width: 100px">Ngày tạo</th>
                                            <th style="min-width: 155px">Hành đồng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>
                                                    @if ($item->type === PROJECT)
                                                        <label class="label label-success">Dự án</label>
                                                    @else
                                                        <label class="label label-primary">Tin tức</label>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-warning text-white">Sửa</a>
                                                    <a href="{{ route('admin.category.delete', $item->id) }}" class="btn btn-danger text-white">Xóa</a>
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