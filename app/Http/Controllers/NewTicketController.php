<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Ticket;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewTicket;

use Carbon\Carbon;

use Validator;

class NewTicketController extends Controller
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
		$data = collect([]);

        $data->categories = DB::table('categories')
                            ->whereIn('status_id',[1, 2, 3])
                            ->get([
                                'categories.id',
                                'categories.name',
                            ]);
        
        return view('tickets.newticket', ['data' => $data]);
    }
	
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'subject' => 'required|min:2|max:250',
            'description' => 'required|min:5',
            'due_date' => 'required',
            'formatted_address' => 'required',
            'ticket_category_id' => 'required',
        ])->validate();
       
        $user_id = Auth::user()->id;

        $data = collect([]);

        $data->statuses=DB::table('statuses')
                        ->where('name','New')
                        ->first([
                            'statuses.id',
                            'statuses.name',
                        ]);

        // dd($user_id);

        $data->NewTicket = Ticket::create([
            'ticket_guid'=>Str::uuid()->toString(),
            'subject'=>$request->subject,
            'description'=>$request->description,
            'due_date'=>$request->due_date,
            'formatted_address'=>$request->formatted_address,
            'ticket_category_id'=>$request->ticket_category_id,
            
            'status_id' => $data->statuses->id,

            'created_user_id' => $user_id,
            'updated_user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
		Mail::to($user_id = Auth::user()->email)
				// ->cc('info@supportsystem.co.za')
				->send(new NewTicket($data));

        return redirect()->action(
            'HomeController@index'
        );
    }
}
