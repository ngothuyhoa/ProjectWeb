<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoAn extends Model
{
    protected $table="do_an";
    public $timestamps = false;

    public function do_an_to_loai_do_an(){
    	return $this->belongsTo('App\LoaiDoAn','id_loai_do_an','id');
    }

    public function do_an_to_sinh_vien(){
    	return $this->belongsTo('App\SinhVien','id_sinh_vien','id');
    }

    public function do_an_to_giang_vien(){
    	return $this->belongsTo('App\GiangVien','id_giang_vien','id');
    }
    
}
