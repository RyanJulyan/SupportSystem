<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);
        //2
        DB::table('roles')->insert([
            'name' => 'User'
        ]);
    }
}
