<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('categories')->insert([
            'name' => 'Sales',
            'created_user_id' => '1',
            'updated_user_id' => '1',
            'status_id' => '2',
        ]);
        //2
        DB::table('categories')->insert([
            'name' => 'Accounts',
            'created_user_id' => '1',
            'updated_user_id' => '1',
            'status_id' => '2',
        ]);
        //3
        DB::table('categories')->insert([
            'name' => 'IT',
            'created_user_id' => '1',
            'updated_user_id' => '1',
            'status_id' => '2',
        ]);
    }
}
