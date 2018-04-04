<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(SinhVienSeeder::class);
    }
}

class SinhVienSeeder extends Seeder{
	public function run(){

		DB::table('SinhVien')->insert(
			['id'=>'1','MSV'=>'20155615','Ten'=>'Ngo Thuy Hoa','NgaySinh'=>'06/06/1996','GioiTinh'=>'Nu','DiaChi'=>'Ha Nam','SDT'=>'0987654321','Email'=>'hoa@gmail.com','Lop'=>'CN-CNTT03','GhiChu'=>'Xinh Gai']);
	}
}