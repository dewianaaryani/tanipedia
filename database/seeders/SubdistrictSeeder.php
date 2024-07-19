<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subdistricts')->insert([
            ['name' => 'Beji', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cimanggis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cipayung', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
