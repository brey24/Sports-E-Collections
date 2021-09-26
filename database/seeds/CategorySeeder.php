<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //to read DB::table

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Basketball'
        ]);

         DB::table('categories')->insert([
            'name' => 'Volleyball'
        ]);

        DB::table('categories')->insert([
        	'name' => 'Boxing'
        ]);

        DB::table('categories')->insert([
        	'name' => 'Badminton'
        ]);

       
    }
}
