@extends('admin::layouts.master')

@section('title') Thống kê @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.statistic.index') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label>Mã nhân viên:</label>
                                                <input type="text" name="search" class="form-control" placeholder="Mã nhân viên" value="{{ request()->search }}">
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
                            <h5>Doanh thu hệ thống: {{ number_format($admins->sum('revenue')) }} VNĐ</h5>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mã nhân viên</th>
                                            <th>Tên nhân viên</th>
                                            <th>Doanh thu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->code }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ number_format($admin->revenue) }} VNĐ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $admins->appends([
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