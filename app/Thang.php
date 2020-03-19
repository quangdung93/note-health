<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;
use App\DetailNote;

class Thang extends Model
{
    //
    protected $table = "thang";

    public function Note(){
        return $this->hasMany(Note::class);
    }
}
