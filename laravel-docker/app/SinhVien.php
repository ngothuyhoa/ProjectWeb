<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\bo_mon;

class SinhVien extends Model
{
    protected $table ="sinh_vien";
    public $timestamps = false;

    public function bomon(){
    	return $this->belongsTo('bo_mon','id_bo_mon','id');
    }
     public function sinh_vien_to_do_an(){
    	return $this->hasMany('App\DoAn','id_sinh_vien','id');
    }
}
