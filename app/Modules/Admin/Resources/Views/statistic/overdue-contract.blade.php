@extends('admin::layouts.master')

@section('title') Thống kê hợp đồng quá hạn @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="user-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.statistic.overdue-contract') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
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
                                            <th>Mã hợp đồng</th>
                                            <th>Tên dự án</th>
                                            <th>Mã khách hàng</th>
                                            <th>Tên khách hàng</th>
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
                                                <td>{{ $contract->user->code }}</td>
                                                <td>{{ $contract->user->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $contracts->appends([
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