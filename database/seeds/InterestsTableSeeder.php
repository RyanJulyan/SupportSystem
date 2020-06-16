<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        
        DB::table('interests')->insert([
            'name' => 'Sport',
            'details' => $faker->paragraph
        ]);

        DB::table('interests')->insert([
            'name' => 'Fishing',
            'details' => $faker->paragraph
        ]);

        DB::table('interests')->insert([
            'name' => 'Gardening',
            'details' => $faker->paragraph
        ]);

        DB::table('interests')->insert([
            'name' => 'Animals',
            'details' => $faker->paragraph
        ]);

        DB::table('interests')->insert([
            'name' => 'Children',
            'details' => $faker->paragraph
        ]);

        foreach (range(1,10) as $index) {
            DB::table('interests')->insert([
                'name' => $faker->jobTitle,
                'details' => $faker->paragraph
            ]);
        }
    }
}
