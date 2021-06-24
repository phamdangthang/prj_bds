@extends('admin::layouts.master')

@section('title') Xác nhận giao dịch @endsection

@section('content')
    <div class="container">
        <form class="form-transaction" action="{{ route('admin.transaction.postConfirm', $transaction->id) }}" method="POST" novalidate>
            {!! csrf_field() !!}
			<div class="row">
			    <div class="col-md-9">
			        <div class="box">
			            <div class="box-body">
			                <div class="form-group">
			                    <label>Ảnh <span class="required">*</span></label>
			                    <div class="form-group" id="uploadListImg1">
		                            @php
		                            if(!empty(old('image', $dataEdit->image ?? null))) {
		                                $faviconCheck = true;
		                            } else {
		                                $faviconCheck = false;
		                            }
		                            @endphp

		                            @include('commons.avatar', [
		                                'avatarCheck' => $faviconCheck,
		                                'avatarKey' => 'image',
		                                'avatarValue' => old('image'),
		                            ])
		                        </div>
			                </div>

			                <div class="form-group">
			                    <label>Thời gian giao dịch<span class="required">*</span></label>
			                    <input type="datetime-local" name="confirmation_date" class="form-control" value="{{ old('confirmation_date') }}" >
			                    {!! $errors->first('confirmation_date', '<span class="help-block error">:message</span>') !!}
			                </div>
			            </div>
			        </div>
			    </div>

			    <div class="col-md-3">
			        <div class="box">
			            <div class="box-body">
			                @include('admin::includes.form-action', ['routeIndex' => route('admin.contract.contract-detail', $transaction->id)])
			            </div>
			        </div>
			    </div>
			</div>

			@include('commons.media')
        </form>
    </div>
@endsection
