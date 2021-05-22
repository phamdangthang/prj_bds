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
                                        @if(isset($dataEdit->category_id) && $dataEdit->category_id === $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block error">:message</span>') !!}
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
                                        @if(isset($dataEdit->city_id) && $dataEdit->city_id === $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('city_id', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Địa chỉ <span class="required">*</span></label>
                    <textarea name="address" rows="2" class="form-control">{{ old('address', $dataEdit->address ?? '') }}</textarea>
                    {!! $errors->first('address', '<span class="help-block error">:message</span>') !!}
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
                                        @if(isset($dataEdit->usage_status) && $dataEdit->usage_status == $key) selected @endif
                                    >{{ $status }}</option>
                                @endforeach
							</select>
                            {!! $errors->first('usage_status', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Diện tích (m²) <span class="required">*</span></label>
							<input type="text" class="form-control" name="acreage" required value="{{ old('acreage', $dataEdit->acreage ?? '') }}">
                            {!! $errors->first('acreage', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Số phòng ngủ <span class="required">*</span></label>
                                <div class="minus-plus">
                                    <input type="number" required min="0" name="number_of_bedrooms" value="{{ old('number_of_bedrooms', $dataEdit->number_of_bedrooms ?? '') }}" class="form-control">
                                </div>
                                {!! $errors->first('number_of_bedrooms', '<span class="help-block error">:message</span>') !!}
                            </div>
                            <div class="col-md-6">
                                <label>Số nhà vệ sinh <span class="required">*</span></label>
                                <div class="minus-plus">
                                    <input type="number" required min="0" name="number_of_toilets" value="{{ old('number_of_toilets', $dataEdit->number_of_toilets ?? '') }}" class="form-control">
                                </div>
                                {!! $errors->first('number_of_toilets', '<span class="help-block error">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Căn hộ <span class="required">*</span></label>
							<input type="text" name="building" class="form-control" required value="{{ old('building', $dataEdit->building ?? '') }}">
                            {!! $errors->first('building', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tầng <span class="required">*</span></label>
							<input type="text" name="floor" class="form-control" required value="{{ old('floor', $dataEdit->floor ?? '') }}">
                            {!! $errors->first('floor', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Số hiệu căn hộ <span class="required">*</span></label>
							<input type="text" name="apartment_number" class="form-control" required value="{{ old('apartment_number', $dataEdit->apartment_number ?? '') }}">
                            {!! $errors->first('apartment_number', '<span class="help-block error">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note', $dataEdit->note ?? '') }}</textarea>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group product-avatar">
                                <label class="mb-0">Hình ảnh căn hộ <span class="required">*</span></label>
                                <div class="upload-list-img" id="uploadListImg">
                                    @php
                                        $images = old('images',  $projectImages ?? []);
                                    @endphp
                                    @foreach ($images as $item)
                                        <div class="item">
                                            <img class="img-thumbnail" src="{{ $item }}">
                                            <input type="hidden" name="images[]" value="{{ $item }}">
                                            <span onclick="removeImgUpload(this)" class="remove-img">
                                                <i class="fa fa-times-circle"></i><span></span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                                {!! $errors->first('images', '<span class="help-block error">:message</span>') !!}
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn-add-images" onclick="initMediaDiv('uploadListImg')">
                                        <b>{{ __('Chọn ảnh') }}</b>
                                    </a>
                                </div>
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
                                @if(isset($dataEdit->status) && $key == $dataEdit->status) selected @endif
                            >{{ $item['text'] }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="is_hot">Dự án hot</label> <br/>
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
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Hướng cửa <span class="required">*</span></label>
                    <select name="door_direction" required class="form-control">
                        <option value=""></option>
                        @foreach (DIRECT as $key => $item)
                            <option 
                                value="{{ $key }}"
                                @if(isset($dataEdit->door_direction) && $dataEdit->door_direction == $key) selected @endif
                            >{{ $item }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('door_direction', '<span class="help-block error">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label>Hướng ban công <span class="required">*</span></label>
                    <select name="balcony_direction" required class="form-control">
                        <option value=""></option>
                        @foreach (DIRECT as $key => $item)
                            <option 
                                value="{{ $key }}"
                                @if(isset($dataEdit->balcony_direction) && $dataEdit->balcony_direction == $key) selected @endif
                            >{{ $item }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('balcony_direction', '<span class="help-block error">:message</span>') !!}
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
                        <input type="text" class="form-control" required value="{{ $customer->name ?? null }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Email <span class="required">*</span></label>
                        <input type="text" class="form-control" required value="{{ $customer->email ?? null }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Số điện thoại <span class="required">*</span></label>
                        <input type="text" class="form-control" value="{{ $customer->phone ?? null }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('commons.media')