<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
               'id' => '1',
               'name' => 'testuser',
               'email' => 'test@test.com',
               'password' => Hash::make('12345678'),
            ], [
                'id' => '2',
                'name' => 'guest',
                'email' => 'guest@guest.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => '3',
                'name' => 'sample',
                'email' => 'sample@sample.com',
                'password' => Hash::make('12345678'),
            ]
           ]);
    }
}
