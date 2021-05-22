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

        <div class="box">
            <div class="box-body">
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
            },
            messages: {
                name: {required: "Trường này không được để trống"},
                slug: {required: "Trường này không được để trống"},
            }
        });
    </script>
@endsection
