@extends('admin.layout.index')

@section('content')
<div id="content" class="span10">
	<div class="text-right">
			@if(session('thongbao'))
                <button style="display: none" class="btn btn-primary noty" data-noty-options='{"text":"{{session('thongbao')}}","layout":"topRight","type":"success"}'></button>
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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Gửi mail đơn hàng</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="sendmail/order" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="line-group">
						<label class="line-label">Người dùng</label>
						<div class="line-control">
							<input type="text" name="txtUser">
						</div>
					</div>

					<div class="form-actions">
						<div class="output"></div>
						<button id="submit" type="submit" class="btn btn-primary">
							<div class="text-sendmail">Gửi mail</div>
						</button>
						<a href="admin/dashboard" class="btn">Hủy bỏ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
