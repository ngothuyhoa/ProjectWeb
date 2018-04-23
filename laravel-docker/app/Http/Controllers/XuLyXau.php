<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XuLyXau;

class XuLyXau extends Controller
{
    public static function stripUnicode($str){

    	if(!$str) return false;

  		$str = str_replace(array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ','ẳ', 'ẵ', 'ặ', 'â','ấ', 'ầ', 'ẩ', 'ẫ', 'ậ'), 'a', $str);

      	$str = str_replace(array('Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ'),'a' , $str);

  		$str = str_replace(array('đ', 'Đ'),'d', $str);

     	$str = str_replace(array('ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ'), 'o', $str);
      
      	$str = str_replace(array('Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ'), 'o', $str);

  		$str = str_replace(array('é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ'), 'e', $str);

      	$str = str_replace(array('É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ'), 'e', $str);

  		$str = str_replace(array('í', 'ì', 'ỉ', 'ĩ', 'ị'), 'i', $str);

      	$str = str_replace(array('Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'), 'i', $str);

  		$str = str_replace(array('ú', 'ù', 'ủ', 'ũ', 'ụ', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự' ), 'u', $str);

  		$str = str_replace(array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'), 'y', $str);

      	$str = str_replace(array('Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'), 'y', $str);

		return $str;
    }

    public static function handlingString($str){

      	$str = XuLyXau::stripUnicode($str);

      	$str = str_replace( array("﻿",',', '.', '?', ':', ';', '!', '\n', '\0', '(', ')', '"', '{', '}', '[', ']', '=', '>', '<', '&', '%', '\t'), ' ', $str );

        $str = str_replace('    ', ' ', $str);
        
        $str = str_replace('   ', ' ', $str);

        $str = str_replace('  ', ' ', $str);

      	$str = strtolower($str);

      	return $str;
    }
}
