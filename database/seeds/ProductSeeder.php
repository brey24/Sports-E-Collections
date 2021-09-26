<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name' => 'Basketball Molten',
        	'price' => 500.00,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet in maiores ipsum, eaque at voluptatum ipsa. Non ullam, tenetur earum.',
        	'image' => 'https://via.placeholder.com/150',
        	'category_id' => 1
        ]);

        DB::table('products')->insert([
        	'name' => 'Volleyball Ball',
        	'price' => 600.00,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet in maiores ipsum, eaque at voluptatum ipsa. Non ullam, tenetur earum.',
        	'image' => 'https://via.placeholder.com/150',
        	'category_id' => 2
        ]);

        DB::table('products')->insert([
        	'name' => 'Boxing Gloves',
        	'price' => 700.00,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet in maiores ipsum, eaque at voluptatum ipsa. Non ullam, tenetur earum.',
        	'image' => 'https://via.placeholder.com/150',
        	'category_id' => 3
        ]);

        DB::table('products')->insert([
        	'name' => 'Badminton Rocket',
        	'price' => 700.00,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet in maiores ipsum, eaque at voluptatum ipsa. Non ullam, tenetur earum.',
        	'image' => 'https://via.placeholder.com/150',
        	'category_id' => 4
        ]);
    }
}
