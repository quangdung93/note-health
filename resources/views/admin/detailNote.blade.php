@extends('admin.layout.index')

@section('style')

<style>
    #tableCompare tbody tr td,#tableCompare thead tr th{
        text-align: center;
    }
</style>

@endsection

@section('content')
    <div id="content" class="span10">

        <div class="row-fluid sortable">        
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>Ghi chú chỉ số sức khỏe {{$note->thang->name}}</h2>
                    <div class="box-icon">
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                            <tr>
                                <th>Chỉ số</th>
                                <th>{{$note->thang->name}}</th>
                            </tr>
                        </thead>   
                    </table>
                </div>
                <div class="note" style="margin-top:15px">
                  <p style="font-weight: 600;color:#014a81">(*) Ghi chú:</p> {{$note->note}}
              </div>
          </div>
          </div><!--/span-->
        </div>

        <div class="text-center">
            {{-- <a class="btn-add btn btn-primary" href="admin/add"><i class="fa fa-plus" aria-hidden="true"></i> So sánh</a> --}}
            <div class="line-group">
                <label class="line-label" style="line-height: 30px">So sánh với</label>
                <div class="line-control">
                    <select id="cboThang" name="cboThang">
                        <option value="null" disable selected>Chọn tháng</option>
                        @foreach($note_thang as $thang)
                            <option value="{{$thang->id}}">{{$thang->thang->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row-fluid sortable">        
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>So sánh chỉ số sức khỏe</h2>
                    <div class="box-icon">
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table id="tableCompare" class="table table-striped table-bordered bootstrap-datatable">
                          <thead>
                            <tr>
                                <th>Chỉ số</th>
                                <th><span id=rel-month></span></th>
                                <th>Tháng {{$note->thang_id}}</th>
                                <th><i style="color:red" class="fa icon-arrow-up"></i> <i style="color:#8cc63f" class="fa icon-arrow-down"></i></th>
                            </tr>
                        </thead>   
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
      return confirm("Bạn có muốn xóa Sự Cố này?");
    }
</script>
@endsection

@section('option')

<script>
    $(document).ready(function(){
        let url = "{!! route('detail',':id') !!}";
        url = url.replace(':id', {{$note->id}});
        showTable(url);
    });

    $('#cboThang').on('change', function(e) {
        let optionSelected = $("option:selected", this);
        let id_thang = this.value;
        if(id_thang == 'null'){
            return false;
        }
        else{
            let name_month = $('#cboThang').find(":selected").text();     
            console.log(name_month);
            $('#rel-month').html(name_month);
            let url = "{!! route('compare',[':id',':compareid']) !!}";
            url = url.replace(':id', {{$note->id}});
            url = url.replace(':compareid', id_thang);
            console.log(url);
            showTableCompare(url);
        }
    });

    function showTable(url){
        $('#mytable').dataTable({
            destroy: true,
            bPaginate: false,
            bFilter: false,
            processing: true,
            serverSide: true,
            bInfo: false,
            ajax: {
                "url": url,
                "type" : "GET",
            },
            columns: [
                { data: 'name',name: 'name'},
                { data: 'value',name: 'value'},
            ],
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
    }

    function showTableCompare(url){
        $('#tableCompare').dataTable({
            destroy: true,
            bPaginate: false,
            bFilter: false,
            processing: true,
            serverSide: true,
            bInfo: false,
            ajax: {
                "url": url,
                "type" : "GET",
            },
            columns: [
                { data: 'name',name: 'name'},
                { data: 'col2',name: 'col2'},
                { data: 'col1',name: 'col1'},
                { data: 'subtract',name: 'subtract'},
            ],
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
    }
</script>

@endsection