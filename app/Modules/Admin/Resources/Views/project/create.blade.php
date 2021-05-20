@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <form class="form-project" action="{{ route('admin.project.store') }}" method="POST" novalidate>
            @include('admin::project._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
