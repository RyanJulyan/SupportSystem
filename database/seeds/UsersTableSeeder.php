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
            'first_name' => 'Matthew',
            'last_name' => 'Walstra',
            'email' => 'mwalstra@cgn.co.za',
            'password' => Hash::make('Matthew Walstra')
            'role_id' => '1',
        ]);
        //2
        DB::table('users')->insert([
            'first_name' => 'Ryan',
            'last_name' => 'Julyan',
            'email' => 'ryan@julyan.biz',
            'password' => Hash::make('Ryan Julyan')
            'role_id' => '2',
        ]);
        //3
        DB::table('users')->insert([
            'first_name' => 'Generic',
            'last_name' => 'Support',
            'email' => 'Generic@Support.biz',
            'password' => Hash::make('Generic Support')
            'role_id' => '1',
        ]);
        //3
        DB::table('users')->insert([
            'first_name' => 'Generic 2',
            'last_name' => 'Support 2',
            'email' => 'Generic2@Support.biz',
            'password' => Hash::make('Generic 2 Support 2')
            'role_id' => '1',
        ]);
    }
}
