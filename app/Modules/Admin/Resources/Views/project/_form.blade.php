{!! csrf_field() !!}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="card-box">
                    @include('admin::includes.form-title')
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Thành phố <span class="required">*</span></label>
                    <select name="city_id" required class="form-control">
                        <option value=""></option>
                        @foreach ($cities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Địa chỉ <span class="required">*</span></label>
                    <textarea name="address" rows="4" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                @include('admin::includes.form-content', ['name' => 'description'])
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box">
            <div class="box-body">
                @include('admin::includes.form-action', ['routeIndex' => route('admin.blog.index')])
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id" required class="form-control">
                        <option value=""></option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
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
