<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //to read DB::table

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name' => 'admin'
        ]);

        DB::table('roles')->insert([
        	'name' => 'normal user'
        ]);
    }
}
