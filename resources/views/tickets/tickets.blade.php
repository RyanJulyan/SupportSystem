@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Tickets</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-block" href="{{ route('new-ticket') }}">
                        New Ticket
                    </a>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-hover DataTable">
                            <thead>
                            <tr>
                            <!-- id	PO_Number	invoice_Number	order_date	company_id	user_id	address_id	created_user_id	updated_by_user_id	created_at	updated_at -->

                                <!-- <th>ID</th> -->
                                <th>GUID</th>
                                <th>Category</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Address</th>
                                <th>Assigned First Name</th>
                                <th>Assigned Last Name</th>
                                <th>Created At</th>
                                <th>Updated First Name</th>
                                <th>Updated Last Name</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($data->tickets as $ticket)
                                <tr>
                                    <td><a href="{{ url('ticket/'.$ticket->ticket_guid) }}" >{{$ticket->ticket_guid}}</a></td>
                                    <td>{{$ticket->category_name}}</td>
                                    <td>{{$ticket->created_first_name}}</td>
                                    <td>{{$ticket->created_last_name}}</td>
                                    <td>{{$ticket->subject}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td>{{$ticket->due_date}}</td>
                                    <td>{{$ticket->formatted_address}}</td>
                                    <td>{{$ticket->assigned_first_name}}</td>
                                    <td>{{$ticket->assigned_last_name}}</td>
                                    <td>{{$ticket->created_at}}</td>
                                    <td>{{$ticket->updated_first_name}}</td>
                                    <td>{{$ticket->updated_last_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $data->tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
