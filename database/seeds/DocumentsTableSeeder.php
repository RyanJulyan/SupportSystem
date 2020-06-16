<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,600) as $index) {
            
            if(rand(1,100)>60){
                
                DB::table('documents')->insert([
                    'name' => $faker->company,
                    'details' => $faker->paragraph,
                    'url' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
                ]);
                
            }
        }
    }
}
