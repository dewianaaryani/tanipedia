<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farms')->insert([
            [
                'user_id' => 2,
                'name' => 'Green Valley Farm',
                'lt' => -6.377060,
                'ld' => 106.824320,
                'location' => '16421',
                'luas' => 150,
                'kualitas_air' => 'Good',
                'kualitas_udara' => 'Excellent',
                'kualitas_tanah' => 'Fertile',
                'contact' => '6287874739802',
                'image' => '20230625143725.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Handoko Farm',
                'lt' => -6.398139,
                'ld' => 106.867142,
                'location' => '16517',
                'luas' => 150,
                'kualitas_air' => 'Good',
                'kualitas_udara' => 'Excellent',
                'kualitas_tanah' => 'Fertile',
                'contact' => '6287874739802',
                'image' => '20230625143725.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'name' => 'Kuntum Farm',
                'lt' => -6.401694,
                'ld' => 106.834091,
                'location' => '16451',
                'luas' => 150,
                'kualitas_air' => 'Good',
                'kualitas_udara' => 'Excellent',
                'kualitas_tanah' => 'Fertile',
                'contact' => '6287874739802',
                'image' => '20230625143725.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'name' => 'Papupu Farm',
                'lt' => -6.6317479,
                'ld' => 106.8245135,
                'location' => '16436',
                'luas' => 150,
                'kualitas_air' => 'Baik',
                'kualitas_udara' => 'Baik',
                'kualitas_tanah' => 'Baik',
                'contact' => '6287874739802',
                'image' => '20230625143725.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
