<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'farm_id' => 2, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 3, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 4, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 1, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 2, // Replace with a valid user ID
                'name' => 'Kangkung',
                'price' => 5000,
                'item_unit' => 'Iket',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 3, // Replace with a valid user ID
                'name' => 'Kangkung',
                'price' => 5000,
                'item_unit' => 'Iket',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 4, // Replace with a valid user ID
                'name' => 'Kangkung',
                'price' => 5000,
                'item_unit' => 'Iket',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 1, // Replace with a valid user ID
                'name' => 'Kangkung',
                'price' => 5000,
                'item_unit' => 'Iket',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 2, // Replace with a valid user ID
                'name' => 'Bawang Daun',
                'price' => 10000,
                'item_unit' => 'Iket',
                'image' => '20230624184540.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 3, // Replace with a valid user ID
                'name' => 'Bawang Daun',
                'price' => 10000,
                'item_unit' => 'Iket',
                'image' => '20230624184540.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 4, // Replace with a valid user ID
                'name' => 'Bawang Daun',
                'price' => 10000,
                'item_unit' => 'Iket',
                'image' => '20230624184540.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 1, // Replace with a valid user ID
                'name' => 'Bawang Daun',
                'price' => 10000,
                'item_unit' => 'Iket',
                'image' => '20230624184540.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 2, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 3, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 4, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'farm_id' => 1, // Replace with a valid user ID
                'name' => 'Kentang',
                'price' => 10000,
                'item_unit' => 'Biji',
                'image' => '20230624184511.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
