@extends('admin::layouts.master')

@section('title') Giao dịch @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="{{ route('admin.transaction.index') }}" method="GET" class="form-horizontal">
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
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mã giao dịch</th>
                                            <th>Mã hợp đồng</th>
                                            <th>Tên giao dịch</th>
                                            <th>Mô tả</th>
                                            <th>Phần trăm</th>
                                            <th>Thời hạn</th>
                                            <th>Tổng tiền</th>
                                            <th style="min-width: 133px">Trạng thái</th>
                                            <th style="min-width: 245px">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->code }}</td>
                                                <td>
                                                    <a href="{{ route('admin.contract.contract-detail', $transaction->contract->id) }}">{{ $transaction->contract->code }}</a>
                                                </td>
                                                <td>{{ $transaction->name }}</td>
                                                <td>{{ $transaction->description }}</td>
                                                <td>{{ $transaction->percent }}%</td>
                                                <td>{{ date_format(new DateTime($transaction->duration),"d/m/Y") }}</td>
                                                <td>{{ number_format($transaction->total_money) }}</td>
                                                <td>
                                                    @if ($transaction->status == 0)
                                                        <label class="label label-warning">Chờ thanh toán</label>
                                                    @elseif ($transaction->status == 1)
                                                        <label class="label label-success">Hoàn thành</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->status == 0)
                                                        <form method="POST" action="{{ route('admin.transaction.confirm', $transaction->id) }}" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Xác nhận</button>
                                                        </form>
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