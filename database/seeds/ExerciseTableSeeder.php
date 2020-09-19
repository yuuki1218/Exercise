<?php

use Illuminate\Database\Seeder;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercises')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'name' => 'ランニング',
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'name' => 'ウォーキング',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'name' => 'ストレッチ',
            ],
            [
                'id' => '4',
                'user_id' => '3',
                'name' => 'ヨガ',
            ],
            [
                'id' => '5',
                'user_id' => '3',
                'name' => '筋トレ',
            ],
            [
                'id' => '6',
                'user_id' => '3',
                'name' => '水泳',
            ],
        ]);
    }
}
