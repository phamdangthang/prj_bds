@extends('admin::layouts.master')

@section('title') Dự án @endsection

@section('content')
    <div class="container">
        <form class="form-project" action="{{ route('admin.project.store') }}" method="POST" novalidate>
            @include('admin::project._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
