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
                                    <form action="{{ route('admin.contract.contract-detail', $id) }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="text" name="search" class="form-control" placeholder="Mã giao dịch" value="{{ request()->search }}">
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
                                    <a href="{{ route('admin.transaction.create', $id) }}" class="btn btn-success">
                                        <i class="fa fa-plus"></i>
                                        <span>Tạo mới</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            Mã hợp đồng:
                        </div>
                        <div class="col-md-9">
                            {{ $contract->code }}
                        </div>
                        <div class="col-md-3">
                            Mã khách hàng:
                        </div>
                        <div class="col-md-9">
                            {{ $contract->user->code }}
                        </div>
                        <div class="col-md-3">
                            Tên khách hàng:
                        </div>
                        <div class="col-md-9">
                            {{ $contract->user->name }}
                        </div>
                        <div class="col-md-3">
                            Tên dự án:
                        </div>
                        <div class="col-md-9">
                            {{ $contract->project->name }}
                        </div>
                        <div class="col-md-3">
                            Tổng tiền:
                        </div>
                        <div class="col-md-9">
                            {{ number_format($contract->total_money) }} VNĐ
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mã giao dịch</th>
                                            <th style="min-width: 200px">Tên giao dịch</th>
                                            <th>Phần trăm</th>
                                            <th>Số tiền</th>
                                            <th style="min-width: 133px">Trạng thái</th>
                                            <th style="min-width: 100px">Thời hạn</th>
                                            <th style="min-width: 150px">Thời gian giao dịch</th>
                                            <th style="min-width: 200px">Ảnh giao dịch</th>
                                            <th style="min-width: 245px">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->contract->code }}</td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->percent }}%</td>
                                                <td>{{ number_format($transaction->total_money) }}VNĐ</td>
                                                <td>
                                                    @if ($transaction->status == 0)
                                                        <label class="label label-warning">Chờ thanh toán</label>
                                                    @elseif ($transaction->status == 1)
                                                        <label class="label label-success">Hoàn thành</label>
                                                    @endif
                                                </td>
                                                <td>{{ date_format(new DateTime($transaction->duration),"d/m/Y") }}</td>
                                                <td>{{ isset($transaction->confirmation_date) ? date_format(new DateTime($transaction->confirmation_date),"d/m/Y H:i:s") : '' }}</td>
                                                <td>
                                                    @if ($transaction->image)
                                                        <img src="{{ asset($transaction->image) }}" alt="{{ $transaction->title }}" class="w-100 h-100">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->status == 0)
                                                        <a href="{{ route('admin.transaction.confirm', $transaction->id) }}" class="btn btn-success">Xác nhận</a>
                                                        <a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-warning">Sửa</a>
                                                        <form method="POST" action="{{ route('admin.transaction.destroy', $transaction->id) }}" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $transactions->appends(['search' => $request->search])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection