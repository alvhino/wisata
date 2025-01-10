<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('petugas')->insert([
        [
        'username' => 'admin',
        'password' =>\Hash::make('1234'),
    ],

    ]);
    }
}
