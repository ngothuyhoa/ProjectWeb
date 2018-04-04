<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SinhVien',function($table){
            $table->increments('id');
            $table->integer('MSV');
            $table->String('Ten');
            $table->String('NgaySinh');
            $table->String('GioiTinh');
            $table->String('DiaChi');
            $table->String('SDT');
            $table->String('Email');
            $table->String('Lop');
            $table->String('GhiChu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('SinhVien');
    }
}
