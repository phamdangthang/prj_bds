{!! csrf_field() !!}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="card-box">
                    @include('admin::includes.form-title')
        
                    <div class="form-group">
                        <label for="title">
                            Danh mục
                            <span class="required">*</span>
                        </label>
                        <select name="category_id" class="form-control" required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if(isset($dataEdit->category_id) && $dataEdit->category_id === $category->id) selected @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="help-block error">:message</span>') !!}
                    </div>

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

        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="is_hot">Tin nổi bật</label> <br/>
                    <label class="switch switch-small">
                        <input 
                            type="checkbox" 
                            name="is_hot"
                            value="1"
                            {{ isset($dataEdit->is_hot) && $dataEdit->is_hot ? 'checked' : '' }}
                        >
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="form-group product-avatar">
                    <label class="mb-0">Ảnh đại diện <span class="required">*</span></label>
                    {!! $errors->first('logo', '<span class="help-block error">:message</span>') !!}
                    <div class="form-group" id="uploadListImg1">
                        @php
                        if(!empty(old('logo', $dataEdit->logo ?? null))) {
                            $faviconCheck = true;
                        } else {
                            $faviconCheck = false;
                        }
                        @endphp

                        @include('commons.avatar', [
                            'avatarCheck' => $faviconCheck,
                            'avatarKey' => 'logo',
                            'avatarValue' => old('logo', $dataEdit->logo ?? null),
                        ])
                    </div>
                    {!! $errors->first('logo', '<span class="help-block error">:message</span>') !!}
                </div>
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
                category_id: "required",
            },
            messages: {
                name: {required: "Trường này không được để trống"},
                slug: {required: "Trường này không được để trống"},
                category_id: {required: "Trường này không được để trống"},
            }
        });
    </script>
@endsection
