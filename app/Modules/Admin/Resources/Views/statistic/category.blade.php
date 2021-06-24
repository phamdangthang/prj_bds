@extends('admin::layouts.master')

@section('title') Thống kê dự án đã bán theo danh mục @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.statistic.category') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label>Tên danh mục:</label>
                                                <input type="text" name="search" class="form-control" placeholder="Tên danh mục" value="{{ request()->search }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Từ ngày:</label>
                                                <input type="date" name="from_date" class="form-control" placeholder="Mã nhân viên" value="{{ request()->from_date }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Từ ngày:</label>
                                                <input type="date" name="to_date" class="form-control" placeholder="Mã nhân viên" value="{{ request()->to_date }}">
                                            </div>
    
                                            <div class="col-md-3 align-self-end">
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
                            <div class="table-responsive mt-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Danh mục</th>
                                            <th>Dự án đã bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->project_sold }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->appends([
                                    'search' => $request->search,
                                    'from_date' => $request->from_date,
                                    'to_date' => $request->to_date,
                                ])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection