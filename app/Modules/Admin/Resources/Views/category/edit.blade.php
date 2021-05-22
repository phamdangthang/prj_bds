@extends('admin::layouts.master')

@section('title') Danh mục @endsection

@section('content')
    <div class="container">
        <form class="form-category" action="{{ route('admin.category.update', $dataEdit->id) }}" method="POST" novalidate>
            @include('admin::category._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
