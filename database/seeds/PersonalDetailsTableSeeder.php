<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Faker\Provider\ar_SA\Person as FakerPerson;

class PersonalDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,50) as $index) {
            DB::table('personal_details')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'id_number' => $faker->numerify('9############')
            ]);
        }
    }
}
