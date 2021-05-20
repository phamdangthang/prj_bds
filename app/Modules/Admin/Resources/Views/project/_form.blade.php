{!! csrf_field() !!}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="card-box">
                    @include('admin::includes.form-title')

                    <div class="form-group">
                        <label>Loại danh mục</label>
                        <select name="type" class="form-control" required>
                            <option value=""></option>
                            <option value="{{ PROJECT }}" @if (isset($dataEdit) && $dataEdit->type === 0) selected @endif>Dự án</option>
                            <option value="{{ NEWS }}" @if (isset($dataEdit) && $dataEdit->type === 1) selected @endif>Tin tức</option>
                        </select>
                    </div>
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

@section('script')
    <script>
        $(".form-category").validate({
            rules: {
                name: "required",
                slug: "required",
                type: "required",
            },
            messages: {
                name: {required: "Trường này không được để trống"},
                slug: {required: "Trường này không được để trống"},
                type: {required: "Trường này không được để trống"},
            }
        });
    </script>
@endsection
