<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\XuLyXau;
use App\SinhVien;
use App\BoMon;
use App\DoAn;
use App\GiangVien;
use App\LoaiDoAn;
use App\User;

class SearchController extends Controller
{
    //
    public static function searchByStudent($key_word){

   		$student = array();

   		$n = 0;

   		$count_key_word = count($key_word);

    	$ket_qua = array();

    	do{
    		$student = null;
    		
    		$student = SinhVien::where('id', '>=', 5*$n+1)->where('id', '<=', 5*($n+1))->get()->toArray();

    		if(count($student)==0) break;

    		for($i=0; $i<count($student); $i++){

    			$stamp = $student[$i];

    			$flag = false;

    			foreach($stamp as $key => $value){

    				$value = XuLyXau::handlingString($value);

    				$value = explode(' ', $value);

    				$j = 0; $k = 0; $so_tu_giong = 0;

    				while($j < count($value)){

    					if($key_word[$k] == $value[$j]){

    						$so_tu_giong++;

    						$ty_le_giong = (float)((float)$so_tu_giong/(float)$count_key_word);

    						if($ty_le_giong >= 0.5){
    							$flag = true;
    							break; 
    						}
    						else {
    							$j++;
    							$k++;
    						}
    					}
    					else {
    						$so_tu_giong = 0;
    						$k = 0;
    						$j++;
    					}
    				}
    				if($flag == true){
    					break;
    				}
    			}
    			if($flag == true){
    				$ket_qua[]= $stamp;
    			}
    		}
    		$n++;

    	}while(true);

    	return $ket_qua;
    }

    public static function searchByTeacher($key_word){

   		$teacher = array();

   		$n = 0;

   		$count_key_word = count($key_word);

    	$ket_qua = array();

    	do{
    		$teacher = null;
    		
    		$teacher = GiangVien::where('id', '>=', 5*$n+1)->where('id', '<=', 5*($n+1))->get()->toArray();

    		if(count($teacher)==0) break;

    		for($i=0; $i<count($teacher); $i++){

    			$stamp = $teacher[$i];

    			$flag = false;

    			foreach($stamp as $key => $value){

    				$value = XuLyXau::handlingString($value);

    				$value = explode(' ', $value);

    				$j = 0; $k = 0; $so_tu_giong = 0;

    				while($j < count($value)){

    					if($key_word[$k] == $value[$j]){

    						$so_tu_giong++;

    						$ty_le_giong = (float)((float)$so_tu_giong/(float)$count_key_word);

    						if($ty_le_giong >= 0.5){
    							$flag = true;
    							break; 
    						}
    						else {
    							$j++;
    							$k++;
    						}
    					}
    					else {
    						$so_tu_giong = 0;
    						$k = 0;
    						$j++;
    					}
    				}
    				if($flag == true){
    					break;
    				}
    			}
    			if($flag == true){
    				$ket_qua[]= $stamp;
    			}
    		}
    		$n++;

    	}while(true);

    	return $ket_qua;
    }
}
