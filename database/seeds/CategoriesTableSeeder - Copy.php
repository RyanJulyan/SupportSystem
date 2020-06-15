<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('users')->insert([
            'name' => 'Matthew Walstra',
            'email' => 'mwalstra@cgn.co.za',
            'password' => Hash::make('Matthew Walstra')
        ]);
    }
}
