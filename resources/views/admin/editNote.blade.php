@extends('admin.layout.index')

@section('content')
<div id="content" class="span10">
	<div class="row-fluid sortable box-suco">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Sửa ghi chú</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/edit/{{$note->id}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="line-group">
						<label class="line-label">Người dùng</label>
						<div class="line-control">
							<span class="input-newstyle">{{$note->user->name}}</span>
						</div>
					</div>
					<div class="line-group">
						<label class="line-label">Ghi chú tháng</label>
						<div class="line-control">
							<select name="cboThang">
                                @foreach($thang as $month)
                                	<option value="{{$month->id}}" @if($note->thang_id == $month->id) selected @endif>{{$month->name}}</option>
								@endforeach
                          </select>
						</div>
					</div>

					@foreach($details as $detail)
						<div class="line-group">
							<label class="line-label">{{$detail->index->name}}</label>
							<div class="line-control">
								<input class="txt-tensuco" type="text" value="{{$detail->value}}" name="txtIndex[]">
								<input type="hidden" name="txtIndexID[]" value="{{$detail->indices_id}}">
							</div>
							<label class="unit-control">{{$detail->index->unit}}</label>
						</div>
					@endforeach

					<div class="control-group">
						<label class="control-label" for="fileInput">Ghi chú khác</label>
						<div class="controls">
							<textarea style="width:90%" id="ckghichu" rows="10" class="control-group" name="txtGhiChu">{{$note->note}}</textarea>
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
