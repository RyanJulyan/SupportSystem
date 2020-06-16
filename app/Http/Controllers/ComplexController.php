<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the new ticket.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

		$data = collect([]);
        
        return view('complex', ['data' => $data]);
    }

    public function animallovers()
    {
        // DB::enableQueryLog();

		$data = collect([]);
        
        $data->table = DB::table('interests AS I')
						->join('interest_links AS IL', 'IL.interest_id', '=', 'I.id')
                        ->join('document_links AS DL', 'DL.personal_details_id', '=', 'IL.personal_details_id')
                        ->join('personal_details AS PD', 'PD.id', '=', 'DL.personal_details_id')
                        ->where('I.name','like','Animals')
                        ->groupBy('PD.first_name')
                        ->groupBy('PD.last_name')
                        ->groupBy('PD.id_number')
                        ->havingRaw('COUNT(DL.document_id) > 1')
                        ->get([
                             'PD.first_name'
                            ,'PD.last_name'
                            ,'PD.id_number'
                        ]);
        
        // dd(DB::getQueryLog());
        // dd($data);
        
        return view('complex.animallovers', ['data' => $data]);
    }
    

    public function childrensportlovers()
    {
        // DB::enableQueryLog();

		$data = collect([]);
        
        $data->table = DB::table('interests AS I')
						->join('interest_links AS IL', 'IL.interest_id', '=', 'I.id')
                        ->join('personal_details AS PD', 'PD.id', '=', 'IL.personal_details_id')
                        ->whereIn('I.name',['Sport','Children'])
                        ->groupBy('PD.first_name')
                        ->groupBy('PD.last_name')
                        ->groupBy('PD.id_number')
                        ->havingRaw('COUNT(IL.personal_details_id) > 1')
                        ->get([
                             'PD.first_name'
                            ,'PD.last_name'
                            ,'PD.id_number'
                        ]);
        
        // dd(DB::getQueryLog());
        // dd($data);
        
        return view('complex.childrensportlovers', ['data' => $data]);
    }

    public function uniqueinterests()
    {
        // DB::enableQueryLog();

		$data = collect([]);
        
        $data->table = DB::table('interests AS I')
						->join('interest_links AS IL', 'IL.interest_id', '=', 'I.id')
                        ->leftJoin('document_links AS DL', 'DL.personal_details_id', '=', 'IL.personal_details_id')
                        ->whereNull('DL.personal_details_id')
                        ->groupBy('I.name')
                        ->select([
                             'I.name',
                             DB::Raw('SUM(IFNULL( DL.`personal_details_id`, 1 )) AS total_no_document')
                        ])
                        ->get();
        
        // dd(DB::getQueryLog());
        // dd($data);
        
        return view('complex.uniqueinterests', ['data' => $data]);
    }

    public function moreinterests()
    {
        // DB::enableQueryLog();

		$data = collect([]);
        
        $data->table = DB::table('interests AS I')
						->join('interest_links AS IL', 'IL.interest_id', '=', 'I.id')
                        ->join('personal_details AS PD', 'PD.id', '=', 'IL.personal_details_id')
                        ->groupBy('PD.first_name')
                        ->groupBy('PD.last_name')
                        ->groupBy('PD.id_number')
                        ->havingRaw('COUNT(IL.personal_details_id) >= 5')
                        ->havingRaw('COUNT(IL.personal_details_id) <= 6')
                        ->get([
                             'PD.first_name'
                            ,'PD.last_name'
                            ,'PD.id_number'
                        ]);
        
        // dd(DB::getQueryLog());
        // dd($data);
        
        return view('complex.moreinterests', ['data' => $data]);
    }
    
}
