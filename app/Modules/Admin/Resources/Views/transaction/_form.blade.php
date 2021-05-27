{!! csrf_field() !!}
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Tên giao dịch <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $dataEdit->name ?? '') }}" required>
                    {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label>Phần trăm (%)<span class="required">*</span></label>
                    <input type="number" min="1" max="100" name="percent" class="form-control" value="{{ old('percent', $dataEdit->percent ?? '') }}" onkeyup="setTotalMoney($(this).val(), {{ $total_money }})" required>
                    {!! $errors->first('percent', '<span class="help-block error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label>Thời hạn <span class="required">*</span></label>
                    <input type="date" name="duration" class="form-control" value="{{ old('duration', $dataEdit->duration ?? '') }}" required>
                    {!! $errors->first('duration', '<span class="help-block error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label>Tổng tiền (VNĐ)</label>
                    <input type="text" name="total_money" class="form-control" disabled value="{{ old('total_money', $dataEdit->total_money ?? '') }}">
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                @include('admin::includes.form-content', ['name' => 'description', 'contentTitle' => 'Mô tả'])
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box">
            <div class="box-body">
                @include('admin::includes.form-action', ['routeIndex' => route('admin.contract.contract-detail', $id)])
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        function setTotalMoney(percent, total_money) {
            $(`input[name="total_money"]`).val(Intl.NumberFormat().format(total_money * percent / 100));
        }
    </script>
@endsection

@include('commons.media')