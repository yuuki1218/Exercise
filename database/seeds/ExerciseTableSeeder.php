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
                'name' => 'ランニング',
            ],
            [
                'id' => '2',
                'name' => 'ウォーキング',
            ],
            [
                'id' => '3',
                'name' => 'ストレッチ',
            ],
            [
                'id' => '4',
                'name' => 'ヨガ',
            ],
            [
                'id' => '5',
                'name' => '筋トレ',
            ],
            [
                'id' => '6',
                'name' => '水泳',
            ],
            [
                'id' => '7',
                'name' => '追加・編集',
            ]
        ]);
    }
}
