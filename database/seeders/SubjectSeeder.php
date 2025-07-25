<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubjectSeeder extends Seeder
{
    public function run()
{
    DB::table('subjects')->insert([
        ['name' => 'Mathematics', 'major_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Physics', 'major_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ]);
}
}
