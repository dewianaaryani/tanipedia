<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villages')->insert([
            ['subdistrict_id' => 1, 'name' => 'Beji', 'post_code' => '16421', 'created_at' => now(), 'updated_at' => now()],
            ['subdistrict_id' => 1, 'name' => 'Duren Seribu', 'post_code' => '16517', 'created_at' => now(), 'updated_at' => now()],
            ['subdistrict_id' => 2, 'name' => 'Cimanggis', 'post_code' => '16451', 'created_at' => now(), 'updated_at' => now()],
            ['subdistrict_id' => 2, 'name' => 'Tugu', 'post_code' => '16455', 'created_at' => now(), 'updated_at' => now()],
            ['subdistrict_id' => 3, 'name' => 'Cipayung', 'post_code' => '16436', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
