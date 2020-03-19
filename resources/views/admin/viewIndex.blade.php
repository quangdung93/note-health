@extends('admin.layout.index')

@section('content')
    <div id="content" class="span10">
        <div class="text-center">
            <a class="btn-add btn btn-primary" href="admin/index/add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm chỉ số</a>
        </div>

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

        <div class="row-fluid sortable">        
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon white user"></i><span class="break"></span>Danh sách chỉ số sức khỏe</h2>
                        <div class="box-icon">
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                        <table id="mytable" class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                            <tr>
                                <th>Tên chỉ số</th>
                                <th>Đơn vị đo</th>
                                <th>Thao tác</th>
                            </tr>
                          </thead>   
                          <tbody>
                            @foreach($indexs as $row)
                            <tr>
                                <td><a href="admin/index/edit/{{$row->id}}">{{$row->name}}</a></td>
                                <td><a href="admin/index/edit/{{$row->id}}">{{$row->unit}}</a></td>
                                <td>
                                    <a class="btn btn-info" href="admin/index/edit/{{$row->id}}" data-rel="tooltip" data-original-title="Sửa">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    {{-- <a class="btn btn-danger" href="admin/delete/{{$row->id}}" onclick="return confirmDelete()" data-rel="tooltip" data-original-title="Xóa">
                                        <i class="halflings-icon white trash"></i> 
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      </div>
                    </div>
                </div><!--/span-->
            </div>
    
    </div>
</div>
@endsection

@section('alert')
<script type="text/javascript">
    function confirmDelete() {
      return confirm("Bạn có muốn xóa Chỉ số này?");
    }
</script>
@endsection

@section('option')

<script>
    $('#mytable').dataTable({
            destroy: true,
            bPaginate: false,
            bFilter: false,
            bInfo: false,
            "oLanguage": {
                "sInfo":         "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
                "sInfoEmpty":      "Hiển thị 0 đến 0 của 0 dòng",
                "sLengthMenu":     "Hiển thị _MENU_ dòng",
                "sEmptyTable":     "Không có dữ liệu",
                "sSearch":         "Tìm kiếm:",
                "oPaginate": {
                    "sFirst":      "Trang đầu",
                    "sLast":       "Trang cuối",
                    "sNext":       "Trang kế",
                    "sPrevious":   "Trang trước"
                }
            },
        });
</script>

@endsection