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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="category_id" required class="form-control">
                                <option value=""></option>
                                @foreach ($projects as $item)
                                    <option 
                                        value="{{ $item->id }}" 
                                        @if($dataEdit->category_id === $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thành phố <span class="required">*</span></label>
                            <select name="city_id" required class="form-control">
                                <option value=""></option>
                                @foreach ($cities as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if($dataEdit->city_id === $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Địa chỉ <span class="required">*</span></label>
                    <textarea name="address" rows="2" class="form-control">{{ old('address', $dataEdit->address ?? '') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Giá (VNĐ) <span class="required">*</span></label>
							<input type="text" class="form-control" name="price" required value="{{ old('price', $dataEdit->price ?? '') }}">
							<span class="node">Lưu ý : Tin rao để mệnh giá tiền Việt Nam đồng</span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Hướng dẫn</label>
                            <textarea name="guide" class="form-control" value="{{ old('guide', $dataEdit->guide ?? '') }}" rows="3" placeholder="Giới thiệu chung về bất động sản của bạn . Ví dụ : khu nhà có vị trí thuận lợi : Gần  công viên, trường học... Tổng diện tích 52m2 đường đi ô tô vào tận cổng">{{ old('guide') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $statuses = [
                                    NEW_TO_USE => 'Mới xây',
                                    USED_ONE_YEAR => 'Đã sử dụng 1 năm',
                                    USED_TWO_YEAR => 'Đã sử dụng 2 năm',
                                    USED_THREE_YEAR => 'Đã sử dụng 3 năm',
                                ];
                            @endphp
                            <label>Tình trạng BĐS <span class="required">*</span></label>
                            <select name="usage_status" required class="form-control">
								<option value=""></option>
                                @foreach ($statuses as $key => $status)
                                    <option 
                                        value="{{ NEW_TO_USE }}"
                                        @if($dataEdit->usage_status == $key) selected @endif
                                    >{{ $status }}</option>
                                @endforeach
							</select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Diện tích (m²) <span class="required">*</span></label>
							<input type="text" class="form-control" name="acreage" required value="{{ old('acreage', $dataEdit->acreage ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Số phòng ngủ <span class="required">*</span></label>
                                <div class="minus-plus">
                                    <input type="number" required min="0" name="number_of_bedrooms" value="{{ old('number_of_bedrooms', $dataEdit->number_of_bedrooms ?? '') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Số nhà vệ sinh <span class="required">*</span></label>
                                <div class="minus-plus">
                                    <input type="number" required min="0" name="number_of_toilets" value="{{ old('number_of_toilets', $dataEdit->number_of_toilets ?? '') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tầng <span class="required">*</span></label>
							<input type="text" name="floor" class="form-control" required value="{{ old('floor', $dataEdit->floor ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số hiệu căn hộ <span class="required">*</span></label>
							<input type="text" name="apartment_number" class="form-control" required value="{{ old('apartment_number', $dataEdit->apartment_number ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note', $dataEdit->note ?? '') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Hình ảnh căn hộ <span class="required">*</span></p>
                            <div class="list-img">
                                @foreach ($images as $key => $img)
                                    @if ($img)
                                        <div class="item">
                                            <i class="fe-x icon-remove"></i>
                                            <label>
                                                <div class="label-mask"></div>
        
                                                <i class="fe-image icon-plus cursor-pointer"></i>
                                                <img src="{{ asset($img->url) }}" class="img-preview">
                                                <input accept="image/*" type="file" class="change_input d-none" name="images[{{ $key }}]">
                                                <input type="hidden" name="images[{{ $key }}]" value="{{ $img->url }}">
                                            </label>
                                        </div>
                                    @else
                                        <div class="item">
                                            <i class="fe-x icon-remove d-none"></i>
                                            <label>
                                                <div class="label-mask"></div>
        
                                                <i class="fe-image icon-plus cursor-pointer"></i>
                                                <img src="" class="img-preview d-none">
                                                <input accept="image/*" type="file" class="change_input d-none" name="images[{{ $key }}]">
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                                {!! $errors->first('images', '<span class="help-block error">:message</span>') !!}
                            </div>
                        </div>
                    </div>
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
                @include('admin::includes.form-action', ['routeIndex' => route('admin.project.index')])
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value=""></option>
                        @foreach ($projectStatus as $key => $item)
                            <option 
                                value="{{ $key }}"
                                @if($key == $dataEdit->status) selected @endif
                            >{{ $item['text'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                @php
                    $directs = [
                        EAST => 'Đông',
                        WEST => 'Tây',
                        SOUTH => 'Nam',
                        NORTH => 'Bắc',
                        SOUTHEAST => 'Đông Nam',
                        NORTHEAST => 'Đông Bắc',
                        SOUTHWEST => 'Tây Nam',
                    ];
                @endphp
                <div class="form-group">
                    <label>Hướng cửa <span class="required">*</span></label>
                    <select name="door_direction" required class="form-control">
                        <option value=""></option>
                        @foreach ($directs as $key => $item)
                            <option 
                                value="{{ NEW_TO_USE }}"
                                @if($dataEdit->door_direction == $key) selected @endif
                            >{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hướng ban công <span class="required">*</span></label>
                    <select name="balcony_direction" required class="form-control">
                        <option value=""></option>
                        @foreach ($directs as $key => $item)
                            <option 
                                value="{{ NEW_TO_USE }}"
                                @if($dataEdit->balcony_direction == $key) selected @endif
                            >{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <p>Thông tin chủ nhà</p>
                    </div>
                    <div class="col-md-12">
                        <label>Tên <span class="required">*</span></label>
                        <input type="text" class="form-control" required value="{{ auth()->user()->name ?? null }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Email <span class="required">*</span></label>
                        <input type="text" class="form-control" required value="{{ auth()->user()->email ?? null }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Số điện thoại <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ auth()->user()->phone ?? null }}" readonly>
                    </div>
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
