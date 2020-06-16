<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Imports\Document;

use Excel;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {

        $uploaddata = $request->file('uploaddata');
        
        // dd($request);
        
		$data = collect([]);
		$data->sorted = [];
		$sorted = [];

        if(!empty($uploaddata)){
            $data->rows = Excel::toArray(new Document, $uploaddata); 
            
            foreach($data->rows[0] as $row){
                // this will implicitly remove Duplicates
                $sorted[$row[0]] = strlen($row[0]);
            }
            foreach($sorted as $key => $value){
                array_push($data->sorted,$key);
            }
            if($request->sort == 'Length'){
                array_multisort(array_map('strlen', $data->sorted), $data->sorted);
            }
            else{
                sort($data->sorted);
            }
        }

        return view('file', ['data' => $data]);
    }
}
