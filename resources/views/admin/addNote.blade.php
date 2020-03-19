@extends('admin.layout.index')

@section('content')
<div id="content" class="span10">
	<div class="text-right">
			@if(count($errors) > 0)
				<button style="display: none" class="btn btn-primary noty" data-noty-options='{"text":"@foreach($errors -> all() as $err){{$err}}<br/>@endforeach","layout":"topRight","type":"error"}'></button>
				@section('script')
					<script type="text/javascript">
						$(document).ready(function(){
							$('.noty').trigger('click');
						});
					</script>
				@endsection
			@endif
		</div>
	<div class="row-fluid sortable box-suco">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm ghi chú</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="line-group">
						<label class="line-label">Người dùng</label>
						<div class="line-control">
							<span class="input-newstyle">{{Auth::user()->name}}</span>
							<input type="hidden" name="txtUser" value="@if(Auth::check()){{Auth::user()->id}}@endif">
						</div>
					</div>
					<div class="line-group">
						<label class="line-label">Ghi chú tháng</label>
						<div class="line-control">
							<select name="cboThang">
                                @foreach($thang as $month)
                                	@if(Carbon\Carbon::now()->format('m') == '0'.$month->id)
                                		<option value="{{$month->id}}" selected>{{$month->name}}</option>
                                	@else
										<option value="{{$month->id}}">{{$month->name}}</option>
									@endif
								@endforeach
                          </select>
						</div>
					</div>

					@foreach($indexs as $index)
						<div class="line-group">
							<label class="line-label">{{$index->name}}</label>
							<div class="line-control">
								<input class="txt-tensuco" type="text" name="txtIndex[]">
								<input type="hidden" name="txtIndexID[]" value="{{$index->id}}">
							</div>
							<label class="unit-control">{{$index->unit}}</label>
						</div>
					@endforeach

					<div class="control-group">
						<label class="control-label" for="fileInput">Ghi chú khác</label>
						<div class="controls">
							<textarea style="width:90%" id="ckghichu" rows="10" class="control-group" name="txtGhiChu"></textarea>
						</div>
					</div>
					<div class="form-actions">
						<div class="output"></div>
						<button id="submit" type="submit" class="btn btn-primary">
							<div class="text-sendmail">Lưu ghi chú</div>
						</button>
						<a href="admin/dashboard" class="btn">Hủy bỏ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
