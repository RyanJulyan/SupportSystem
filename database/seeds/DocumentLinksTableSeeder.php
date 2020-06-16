<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DocumentLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $max_document_id = DB::table('documents')->max('id');

        $faker = Faker::create();

        foreach (range(1,50) as $Pidx) {

            $user_interests_no_link = DB::table('interest_links')
                                    ->where('personal_details_id',$Pidx)
                                    ->whereIn('interest_id',[1,2])
                                    ->get('id');

            $user_interests_multi_doc = DB::table('interest_links')
                                    ->where('personal_details_id',$Pidx)
                                    ->whereIn('interest_id',[3,4,5])
                                    ->get('id');

            if(count($user_interests_no_link) == 0){
            
                if(rand(1,100)>60){

                    if(count($user_interests_multi_doc) == 0){
                        DB::table('document_links')->insert([
                            'personal_details_id' => $Pidx,
                            'document_id' => rand(1,$max_document_id)
                        ]);
                    }
                    else{
                        foreach (range(1,rand(2,12)) as $Iidx) {
                            DB::table('document_links')->insert([
                                'personal_details_id' => $Pidx,
                                'document_id' => rand(1,$max_document_id)
                            ]);
                        }
                    }
                }
            }

            $user_interests_no_link = [];
            $user_interests_multi_doc = [];

        }
    }
}
