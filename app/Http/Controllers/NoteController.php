<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Index;
use App\User;
use App\Note;
use App\Thang;
use App\DetailNote;
use Carbon\Carbon;
use DataTables;

class NoteController extends Controller
{
    //
    public function getAdd(){
    	$thang = Thang::get();
    	$indexs = Index::get();
    	return view('admin.addNote',compact('indexs','thang'));
    }

    public function postAdd(Request $request){

        $this->validate($request,
            [
                'cboThang' => 'required|unique:notes,thang_id,'.$request->cboThang,
            ],
            [
                'cboThang.required' => 'Bạn chưa chọn tháng',
                'cboThang.unique' => 'Tháng ' .$request->cboThang.' đã tồn tại ghi chú!',
            ]);

    	$note = new Note();
    	$note->user_id = $request->input('txtUser');
    	$note->thang_id = $request->input('cboThang');
    	$note->note = $request->input('txtGhiChu');

    	if($note->save()){
    		$last_id = $note->id;
    	}
    	if(count($request->txtIndex) > 0){
            foreach($request->txtIndex as $item => $value){
                $detail_array[] = [
                    'note_id' => $last_id,
                    'indices_id' => $request->txtIndexID[$item],
                    'value' => $request->txtIndex[$item]
                ];
            }
        }

    	DetailNote::insert($detail_array);

    	return redirect('admin/dashboard')->with('thongbao','Thêm thành công!');
    }

    public function getEdit($id){
    	$thang = Thang::get();
    	$note = Note::findOrFail($id);
    	$details= DetailNote::where('note_id','=',$id)->get();
    	return view('admin.editNote',compact('note','details','thang'));
    }

    public function postEdit(Request $request,$note_id){

    	$note = Note::find($note_id);
    	$note->note = $request->input('txtGhiChu');
    	$note->save();

		foreach($request->txtIndex as $item => $value){
    		$detail_array[] = [
		        'indices_id' => $request->txtIndexID[$item],
		        'value' => $request->txtIndex[$item]
		    ];
    	}

    	$table = DetailNote::getModel()->getTable();

    	$cases = [];
	    $ids = [];
	    $params = [];

	    foreach ($detail_array as $detail) {
	    	$detail = (object)$detail;
	        $indices_id = (int)$detail->indices_id;
	        $cases[] = "WHEN {$indices_id} then ?";
	        $params[] = $detail->value;
	        $ids[] = $indices_id;
	    }

	    // dd($detail_array);

	    $ids = implode(',', $ids);
	    $cases = implode(' ', $cases);
	    $params[] = Carbon::now();

    	DB::update("UPDATE {$table} SET value = CASE indices_id {$cases} END,updated_at = ? WHERE note_id = {$note_id} AND indices_id in ({$ids})",$params);
    	return redirect('admin/dashboard')->with('thongbao','Sửa thành công!');

    }

    public function getDetail($id){
    	$note = Note::findOrFail($id);
    	$note_thang = Note::where('id','<>',$id)->get();
    	
    	return view('admin.detailNote',compact('note','note_thang'));
    }

    public function getData($id){
    	$details = DetailNote::join('indices','detail.indices_id','=','indices.id')
    	->join('notes','notes.id','=','detail.note_id')
    	->where('detail.note_id','=',$id)
    	->select(
    		'indices.name as name',
    		'detail.value as value',
    		'indices.unit as unit'
    	)
    	->get();

    	return $this->getDatatable($details);
    }

    public function getDataCompare($id, $compareid){
    	$data = DetailNote::join('indices','detail.indices_id','=','indices.id')
    	->join('notes','notes.id','=','detail.note_id')
    	->select('indices.name as name')
    	->selectRaw('MAX(CASE WHEN detail.note_id = :id THEN detail.value END) as col1',['id' => $id])
    	->selectRaw('MAX(CASE WHEN detail.note_id = :idunit THEN indices.unit END) as col1unit',['idunit' => $id])
    	->selectRaw('MAX(CASE WHEN detail.note_id = :compareid THEN detail.value END) as col2',['compareid' =>$compareid])
    	->selectRaw('MAX(CASE WHEN detail.note_id = :compareidunit THEN indices.unit END) as col2unit',['compareidunit' =>$compareid])
    	->selectRaw('MAX(CASE WHEN detail.note_id = :idsub THEN detail.value END) - MAX(CASE WHEN detail.note_id = :compareidsub THEN detail.value END) as subtract',['idsub' => $id,'compareidsub' =>$compareid])
    	->groupBy('indices.name')
    	->get();

    	return $this->getDatatableCompare($data);
    }


    public function getDatatable($table){

        return Datatables::of($table)
        ->editColumn('name', function ($row) {
            return $row->name;
        })
        ->editColumn('value', function ($row) {
        	$value = "";
        	$value .="<span style='font-weight: 600'>". $row->value ."</span> <span style='color:#014a81'>".$row->unit."</span>";
            return $value;
        })
        ->rawColumns(['name','value'])
        ->make(true);
    }

    public function getDatatableCompare($table){

        return Datatables::of($table)
        ->editColumn('name', function ($row) {
            return $row->name;
        })
        ->editColumn('col1', function ($row) {
        	$value = "";
        	$value .="<span style='font-weight:600'>". $row->col1 ."</span> <span style='color:#014a81'>". $row->col1unit ."</span>";
            return $value;
        })
        ->editColumn('col2', function ($row) {
        	$value = "";
        	$value .="<span style='font-weight:600'>". $row->col2 ."</span> <span style='color:#014a81'>". $row->col2unit ."</span>";
            return $value;
        })
        ->editColumn('subtract', function ($row) {
        	$value = "";
        	if($row->subtract > 0){
        		$value .="<span style='font-weight:600'>".$row->subtract." <i style='color:red' class='fa icon-arrow-up'></i></span>";
        	}
        	elseif($row->subtract == 0){
        		$value .="<span style='font-weight:600'>".$row->subtract." <i style='color:#014a81' class='fa icon-pause'></i></span>";
        	}
        	else{
        		$value .="<span style='font-weight:600'>".$row->subtract." <i style='color:#8cc63f' class='fa icon-arrow-down'></i></span>";
        	}
            return $value;
        })
        ->rawColumns(['name','col1','col2','subtract'])
        ->make(true);
    }

    public function getViewIndex(){
        $indexs = Index::all();

        return view('admin.viewIndex',compact('indexs'));
    }

    public function getAddIndex(){
        return view('admin.addIndex');
    }

    public function postAddIndex(Request $request){
        $index = new Index();
        $index->name = $request->txtIndex;
        $index->unit = $request->txtUnit;
        $index->save();

        return redirect('admin/index/view')->with('thongbao','Sửa thành công!');
    }

    public function getEditIndex($id){
        $index = Index::find($id);

        return view('admin.editIndex',compact('index'));
    }

    public function postEditIndex(Request $request, $id){
        $index = Index::find($id);
        $index->name = $request->txtIndex;
        $index->unit = $request->txtUnit;
        $index->save();

        return redirect('admin/index/view')->with('thongbao','Sửa thành công!');
    }

}
