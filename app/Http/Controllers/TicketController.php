<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Ticket;

use Carbon\Carbon;

use Validator;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the new ticket.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user_id = Auth::user()->id;

		$data = collect([]);
        
        $data->tickets = DB::table('tickets AS T')
						->join('categories AS C', 'C.id', '=', 'T.ticket_category_id')
						->join('statuses AS S', 'S.id', '=', 'T.status_id')
						->join('users AS CU', 'CU.id', '=', 'T.created_user_id')
						->join('users AS UU', 'UU.id', '=', 'T.updated_user_id')
						->leftJoin('users AS AU', 'AU.id', '=', 'T.assigned_user_id')
                        ->where('T.created_user_id',$user_id)
                        ->select([
                            'T.id',
                            'T.ticket_guid',
                            'T.subject',
                            'T.description',
                            'T.due_date',
                            'T.formatted_address',
                            'T.created_at',
                            'C.name AS category_name',
                            'S.name AS status_name',
                            'AU.first_name AS assigned_first_name',
                            'AU.last_name AS assigned_last_name',
                            'CU.first_name AS created_first_name',
                            'CU.last_name AS created_last_name',
                            'UU.first_name AS updated_first_name',
                            'UU.last_name AS updated_last_name',
                        ])
                        ->paginate(10);

        // dd($data);
        
        return view('tickets.tickets', ['data' => $data]);
    }

    public function index_all()
    {

		$data = collect([]);
        
        $data->tickets = DB::table('tickets AS T')
						->join('categories AS C', 'C.id', '=', 'T.ticket_category_id')
						->join('statuses AS S', 'S.id', '=', 'T.status_id')
						->join('users AS CU', 'CU.id', '=', 'T.created_user_id')
						->join('users AS UU', 'UU.id', '=', 'T.updated_user_id')
						->leftJoin('users AS AU', 'AU.id', '=', 'T.assigned_user_id')
                        ->select([
                            'T.id',
                            'T.ticket_guid',
                            'T.subject',
                            'T.description',
                            'T.due_date',
                            'T.formatted_address',
                            'T.created_at',
                            'C.name AS category_name',
                            'S.name AS status_name',
                            'AU.first_name AS assigned_first_name',
                            'AU.last_name AS assigned_last_name',
                            'CU.first_name AS created_first_name',
                            'CU.last_name AS created_last_name',
                            'UU.first_name AS updated_first_name',
                            'UU.last_name AS updated_last_name',
                        ])
                        ->paginate(10);

        // dd($data);
        
        return view('tickets.tickets', ['data' => $data]);
    }
    
	public function update(Request $request)	
	{
        
        $validator = Validator::make($request->all(), [
            'status_id' => 'required',
            'ticket_category_id' => 'required',
        ])->validate();
        
        $user_id = Auth::user()->id;
        
        // dd($request);

		DB::table('tickets AS T')
		->where('T.id', $request->id)
		->update([
			'T.status_id'=>$request->status_id,
			'T.ticket_category_id'=>$request->ticket_category_id,
            'T.assigned_user_id'=>$request->assigned_user_id,
            
			'T.updated_at' => Carbon::now(),
			'T.updated_user_id' => $user_id,
		]);

		return redirect()->back();
	}
}
