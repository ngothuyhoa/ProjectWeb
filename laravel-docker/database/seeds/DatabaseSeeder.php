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
        $this->call(AdminSeeder::class);
    }
}
class AdminSeeder extends Seeder{
	public function run(){

		DB::table('users')->insert(
			['name'=>'AD03','password'=>bcrypt('123')]);
	}
}
