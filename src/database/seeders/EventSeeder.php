<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => '新しいイベント',
                'detail' => '新しいイベントです',
                'attendee_info' => '参加者だけ',
                'event_at' => new Datetime(),
                'place' => '和歌山',
                'user_id' => '1'
            ]
        ]);
    }
}
