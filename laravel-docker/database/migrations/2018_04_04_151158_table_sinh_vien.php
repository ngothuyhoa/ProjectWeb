<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_vien',function($table){
            $table->increments('id');
            $table->string('user_name',10)->unique();
            $table->string('full_name',50);
            $table->date('birthday');
            $table->string('gender',10);
            $table->string('address',100);
            $table->string('email',100)->unique();
            $table->string('phone_number',15)->unique();
            $table->string('class',50);
             $table->integer('id_bo_mon')->unsigned();
            $table->string('note',100);
            $table->foreign('id_bo_mon')->references('id')->on('bo_mon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sinh_vien');
    }
}
