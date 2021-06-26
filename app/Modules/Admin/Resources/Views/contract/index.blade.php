@extends('admin::layouts.master')

@section('title') Hợp đồng @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="{{ route('admin.contract.index') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="text" name="search" class="form-control" placeholder="Mã hợp đồng" value="{{ request()->search }}">
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
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mã hợp đồng</th>
                                            <th>Tên dự án</th>
                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Giá bán</th>
                                            <th style="min-width: 100px">Ngày đăng</th>
                                            <th style="min-width: 155px">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contracts as $contract)
                                            <tr>
                                                <td>{{ $contract->id }}</td>
                                                <td>
                                                    <a href="{{ route('admin.contract.contract-detail', $contract->id) }}">{{ $contract->code }}</a>
                                                </td>
                                                <td style="max-width: 350px">{{ $contract->project->name }}</td>
                                                <td>{{ $contract->user->name }}</td>
                                                <td>
                                                    @if ($contract->status == 1)
                                                        <label class="label label-primary">Chờ đặt cọc</label>
                                                    @elseif ($contract->status == 2)
                                                        <label class="label label-warning">Đang giao dịch</label>
                                                    @elseif ($contract->status == 3)
                                                        <label class="label label-success">Hoàn thành</label>
                                                    @elseif ($contract->status == 4)
                                                        <label class="label label-danger">Đã hủy</label>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($contract->total_money) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($contract->created_at)) }}</td>
                                                <td>
                                                    @if ($contract->status < 3)
                                                        <a href="{{ route('admin.contract.cancel', $contract->id) }}" class="btn btn-danger text-white">Hủy</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $contracts->appends(['search' => $request->search])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection