<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNguyenVongDoAn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('nguyen_vong_do_an',function($table){
            $table->increments('id');
            $table->integer('id_sinh_vien')->unsigned();
            $table->integer('id_loai_do_an')->unsigned();
            $table->integer('id_bo_mon')->unsigned();
            $table->string('ten_de_tai',100);
            $table->integer('id_giang_vien')->unsigned();
            $table->String('hoc_ky',10);
            $table->string('trang_thai',100);
            $table->foreign('id_loai_do_an')->references('id')->on('loai_do_an');
            $table->foreign('id_bo_mon')->references('id')->on('bo_mon');
            $table->foreign('id_sinh_vien')->references('id')->on('sinh_vien');
            $table->foreign('id_giang_vien')->references('id')->on('giang_vien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('nguyen_vong_do_an');
    }
}
