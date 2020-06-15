<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('statuses')->insert([
            'name' => 'New',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //2
        DB::table('statuses')->insert([
            'name' => 'Active',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //3
        DB::table('statuses')->insert([
            'name' => 'Inactive',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //4
        DB::table('statuses')->insert([
            'name' => 'Deleted',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //5
        DB::table('statuses')->insert([
            'name' => 'Error',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //6
        DB::table('statuses')->insert([
            'name' => 'Failed',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //7
        DB::table('statuses')->insert([
            'name' => 'Cancelled',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //8
        DB::table('statuses')->insert([
            'name' => 'On Hold',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //9
        DB::table('statuses')->insert([
            'name' => 'Processing',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //10
        DB::table('statuses')->insert([
            'name' => 'Completed',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //11
        DB::table('statuses')->insert([
            'name' => 'In Progress',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
        //12
        DB::table('statuses')->insert([
            'name' => 'Resolved',
            'created_user_id' => '1',
            'updated_user_id' => '1',
        ]);
    }
}
