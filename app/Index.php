<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;
use App\DetailNote;

class Index extends Model
{
    //
    protected $table = "indices";

    public function Note(){
        return $this->hasMany(Note::class);
    }

    public function Detail(){
        return $this->hasMany(DetailNote::class);
    }
}
