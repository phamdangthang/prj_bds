@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <form class="form-category" action="{{ route('admin.category.store') }}" method="POST" novalidate>
            @include('admin::category._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
