<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;
use App\Index;


class DetailNote extends Model
{
    //

    public $table = "detail";

    public function Note(){
        return $this->belongsTo(Note::class);
    }	
    public function Index(){
        return $this->belongsTo('App\Index','indices_id','id');
    }	
}
