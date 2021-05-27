@extends('admin::layouts.master')

@section('title') Tạo giao dịch @endsection

@section('content')
    <div class="container">
        <form class="form-transaction" action="{{ route('admin.transaction.store', $id) }}" method="POST" novalidate>
            @include('admin::transaction._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
