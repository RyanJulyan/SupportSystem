<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Ticket;

use Carbon\Carbon;

use Validator;

class PublicTicketController extends Controller
{

    public function show(Request $request)
    {

        $ticket_guid = $request['guid'];

		$data = collect([]);

        $data->statuses=DB::table('statuses')
                        ->get([
                            'statuses.id',
                            'statuses.name',
                        ]);

        $data->categories = DB::table('categories')
                            ->whereIn('status_id',[1, 2, 3])
                            ->get([
                                'categories.id',
                                'categories.name',
                            ]);

        $data->users = DB::table('users')
                            ->whereIn('role_id',[1])
                            ->get([
                                'users.id',
                                'users.first_name',
                                'users.last_name',
                            ]);

        $data->status_res = DB::table('statuses')
                            ->where('name','Resolved')
                            ->first([
                                'statuses.id',
                                'statuses.name',
                            ]);
        
        $data->ticket = DB::table('tickets AS T')
                        ->join('categories AS C', 'C.id', '=', 'T.ticket_category_id')
                        ->join('statuses AS S', 'S.id', '=', 'T.status_id')
                        ->join('users AS CU', 'CU.id', '=', 'T.created_user_id')
                        ->join('users AS UU', 'UU.id', '=', 'T.updated_user_id')
                        ->leftJoin('users AS AU', 'AU.id', '=', 'T.assigned_user_id')
                        ->where('ticket_guid',$ticket_guid)
                        ->first([
                            'T.id',
                            'T.ticket_guid',
                            'T.subject',
                            'T.description',
                            'T.due_date',
                            'T.formatted_address',
                            'T.created_at',
                            'C.id AS category_id',
                            'C.name AS category_name',
                            'S.name AS status_name',
                            'S.id AS status_id',
                            'T.assigned_user_id AS assigned_id',
                            'AU.first_name AS assigned_first_name',
                            'AU.last_name AS assigned_last_name',
                            'CU.id AS created_id',
                            'CU.first_name AS created_first_name',
                            'CU.last_name AS created_last_name',
                            'UU.first_name AS updated_first_name',
                            'UU.last_name AS updated_last_name',
                        ]);
        
        return view('tickets.viewticket', ['data' => $data]);
    }
    
}
