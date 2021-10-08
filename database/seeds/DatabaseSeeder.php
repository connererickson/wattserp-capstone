<?php

use App\User;
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
    	//Eloquent::unguard();

      	//$this->call(UserTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        
        // Role comes before User seeder here.
  		$this->call(RoleTableSeeder::class);
    }
}