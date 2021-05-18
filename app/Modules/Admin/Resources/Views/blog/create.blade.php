@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <form class="form-blog" action="{{ route('admin.blog.store') }}" method="POST" novalidate>
            @include('admin::blog._form', ['routeType' => 'create'])
        </form>
    </div>
@endsection
