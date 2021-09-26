<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@email.com',
        	'password' => Hash::make('test1234'),
        	'role_id' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'normal user',
        	'email' => 'normal@email.com',
        	'password' => Hash::make('test1234'),
        	'role_id' => 2
        ]);
    }
}
