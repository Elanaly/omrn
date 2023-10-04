<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attend_statuses')->insert([
            [
                'user_id' => '1',
                'event_id' => '1',
                'status' => '1'
            ]
        ]);
    }
}
