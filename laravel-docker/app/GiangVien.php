<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    protected $table= "giang_vien";
     public $timestamps = false;

     public function giang_vien_to_bo_mon(){
    	return $this->belongsTo('App\BoMon','id_bo_mon', 'id');
    }

    public function giang_vien_to_do_an(){
    	return $this->hasMany('App\DoAn','id_giang_vien','id');
    }
}
