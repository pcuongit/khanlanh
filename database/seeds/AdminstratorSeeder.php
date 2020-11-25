<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminstratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adminstrator')->insert([
            'username' => 'admin',
            'password' => Hash::make('1234Abcd')
        ]);
    }
}