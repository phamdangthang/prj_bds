@extends('admin::layouts.master')

@section('title') Dự án @endsection

@section('content')
    <div class="container">
        <form class="form-transaction" action="{{ route('admin.transaction.update', $dataEdit->id) }}" method="POST" novalidate>
            @include('admin::transaction._form', ['routeType' => 'edit'])
        </form>
    </div>
@endsection
