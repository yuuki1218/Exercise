<?php

use Illuminate\Database\Seeder;
use App\Models\Calendar;

class CalendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendars')->insert([
        [
            'user_id' => '1',
            'title' => 'ランニング',
            'line' => '10分走る。',
            'lowest_line' => '1回スクワット',
            'goal' => '体重5キロ減らす。'
        ],
        [
            'user_id' => '1',
            'title' => '筋トレ',
            'line' => '腕立て毎日10回',
            'lowest_line' => '腕立て毎日1回',
            'goal' => '腕立て30回出来るようにする。'
        ],
        [
            'user_id' => '1',
            'title' => '朝6時起き',
            'line' => '朝6時に起きたら30分散歩',
            'lowest_line' => '朝6時に起きて5分だけ散歩',
            'goal' => '朝6時に起きて散歩に行く。'
        ],
        [
            'user_id' => '2',
            'title' => 'ランニング',
            'line' => '10分走る。',
            'lowest_line' => '1回スクワット',
            'goal' => '体重5キロ減らす。'
        ],
        [
            'user_id' => '2',
            'title' => '筋トレ',
            'line' => '腕立て毎日10回',
            'lowest_line' => '腕立て毎日1回',
            'goal' => '腕立て30回出来るようにする。'
        ],
        [
            'user_id' => '2',
            'title' => '朝6時起き',
            'line' => '朝6時に起きたら30分散歩',
            'lowest_line' => '朝6時に起きて5分だけ散歩',
            'goal' => '朝6時に起きて散歩に行く。'
        ]
    ]);
    }
}
