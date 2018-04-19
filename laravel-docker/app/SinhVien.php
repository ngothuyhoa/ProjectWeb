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
}
