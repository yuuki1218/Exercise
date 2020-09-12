<?php

use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
        [
           'calendar_id' => '1',
           'done' => '1',
           'date' => '2020-09-02',
        ], [
           'calendar_id' => '2',
           'done' => '1',
           'date' => '2020-09-25',
        ], [
           'calendar_id' => '1',
           'done' => '1',
           'date' => '2020-09-26',
        ],
        [
            'calendar_id' => '4',
            'done' => '1',
            'date' => '2020-09-02',
         ], [
            'calendar_id' => '4',
            'done' => '1',
            'date' => '2020-09-25',
         ], [
            'calendar_id' => '6',
            'done' => '1',
            'date' => '2020-09-26',
         ]
       ]);
    }
}
