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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Sửa chỉ số sức khỏe</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/index/edit/{{$index->id}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="control-group">
						<label class="control-label">Tên chỉ số: </label>
						<div class="controls">
							<input type="text" value="{{$index->name}}" name="txtIndex">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Đơn vị: </label>
						<div class="controls">
							<input type="text" value="{{$index->unit}}" name="txtUnit">
						</div>
					</div>
					<div class="form-actions">
						<div class="output"></div>
						<button id="submit" type="submit" class="btn btn-primary">
							<div class="text-sendmail">Sửa</div>
						</button>
						<a href="admin/index/view" class="btn">Hủy bỏ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
