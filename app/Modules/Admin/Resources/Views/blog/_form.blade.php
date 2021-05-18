{!! csrf_field() !!}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="card-box">
                    @include('admin::includes.form-title')
        
                    @include('admin::includes.form-content')
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box">
            <div class="box-body">
                @include('admin::includes.form-action', ['routeIndex' => route('admin.blog.index')])
            </div>
        </div>
    </div>
</div>

@include('commons.media')

@section('script')
    <script>
        $(".form-blog").validate({
            rules: {
                name: "required",
                slug: "required",
            },
            messages: {
                name: {required: "Trường này không được để trống"},
                slug: {required: "Trường này không được để trống"},
            }
        });
    </script>
@endsection
