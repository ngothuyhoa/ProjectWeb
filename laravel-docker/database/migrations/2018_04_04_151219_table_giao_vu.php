<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableGiaoVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_vu',function($table){
            $table->increments('id');
            $table->string('user_name',10)->unique();
            $table->string('full_name',50);
            $table->date('birthday');
            $table->string('gender',10);
             $table->string('email',100)->unique();
            $table->string('phone_number',15)->unique();
            $table->string('note',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('giao_vu');
    }
}
