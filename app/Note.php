<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Thang;
use App\Index;
use App\DetailNote;

class Note extends Model
{
    //
    protected $table = "notes";
    
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Detail(){
        return $this->hasMany(DetailNote::class);
    }

    public function Thang(){
        return $this->belongsTo(Thang::class);
    }
}
