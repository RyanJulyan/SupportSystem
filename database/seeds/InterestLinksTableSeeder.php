<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class InterestLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,50) as $Pidx) {
            foreach (range(1,rand(3,12)) as $Iidx) {
                
                if($Iidx <= 2){
                    if(rand(1,100)>60){
                        
                        DB::table('interest_links')->insert([
                            'personal_details_id' => $Pidx,
                            'interest_id' => $Iidx
                        ]);
                        
                    }
                }
                else{
                    DB::table('interest_links')->insert([
                        'personal_details_id' => $Pidx,
                        'interest_id' => $Iidx
                    ]);
                }
            }
        }
    }
}
