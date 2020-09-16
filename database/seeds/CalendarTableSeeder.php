<?php

use Illuminate\Database\Seeder;

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
            'exercise_id' => '1',
            'exercise_name' => 'ランニング',
            'line' => '10分走る。',
            'lowest_line' => '1回スクワット',
            'goal' => '体重5キロ減らす。'
        ],
        [
            'user_id' => '1',
            'exercise_id' => '2',
            'exercise_name' => 'ウォーキング',
            'line' => '腕立て毎日10回',
            'lowest_line' => '腕立て毎日1回',
            'goal' => '腕立て30回出来るようにする。'
        ],
        [
            'user_id' => '1',
            'exercise_id' => '3',
            'exercise_name' => 'ストレッチ',
            'line' => '朝6時に起きたら30分散歩',
            'lowest_line' => '朝6時に起きて5分だけ散歩',
            'goal' => '朝6時に起きて散歩に行く。'
        ],
        [
            'user_id' => '2',
            'exercise_id' => '4',
            'exercise_name' => 'ヨガ',
            'line' => '10分走る。',
            'lowest_line' => '1回スクワット',
            'goal' => '体重5キロ減らす。'
        ],
        [
            'user_id' => '2',
            'exercise_id' => '5',
            'exercise_name' => '筋トレ',
            'line' => '腕立て毎日10回',
            'lowest_line' => '腕立て毎日1回',
            'goal' => '腕立て30回出来るようにする。'
        ],
        [
            'user_id' => '2',
            'exercise_id' => '6',
            'exercise_name' => '水泳',
            'line' => '朝6時に起きたら30分散歩',
            'lowest_line' => '朝6時に起きて5分だけ散歩',
            'goal' => '朝6時に起きて散歩に行く。'
        ]
    ]);
    }
}
