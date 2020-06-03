<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];


    public function pendidikan(){
        return $this->belongsTo("App\Pendidikan",'pendidikan_id','id');
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }
    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }
    
}
