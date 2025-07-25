<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
    ['id' => 1, 'name' => 'Science', 'created_at' => now(), 'updated_at' => now()],
    ['id' => 2, 'name' => 'Arts', 'created_at' => now(), 'updated_at' => now()],
]);

    }
}
