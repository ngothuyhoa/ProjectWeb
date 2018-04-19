<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBoMon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bo_mon',function($table){
            $table->increments('id');
            $table->string('ten_bo_mon',100)->unique();
            $table->string('ten_bo_mon_viet_tat',10)->unique();
            $table->string('van_phong',10);
            $table->string('SDT',20);
            $table->string('website',100);
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
        Schema::drop('bo_mon');
    }
}
