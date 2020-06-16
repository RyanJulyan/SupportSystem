@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-block" href="{{ route('new-ticket') }}">
                        New Ticket
                    </a>
                    <br/>
                    
                    @if (empty($data->lastticket->ticket_guid))
                    <div class="card">
                        <div class="card-header">Welcome</div>
                        <div class="card-body">
                            <p>Welcome to the SupportSystem. Please log your first support ticket</p>
                        </div>
                    </div>
                    @else
                        <div class="card">
                            <div class="card-header">Your Last Ticket</div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover DataTable">
                                        <thead>
                                        <tr>
                                        <!-- id	PO_Number	invoice_Number	order_date	company_id	user_id	address_id	created_user_id	updated_by_user_id	created_at	updated_at -->

                                            <!-- <th>ID</th> -->
                                            <th>GUID</th>
                                            <th>Category</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th>Assigned To</th>
                                            <th>Created At</th>
                                            <th>Updated By</th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ url('ticket/'.$data->lastticket->ticket_guid) }}" >{{$data->lastticket->ticket_guid}}</a></td>
                                                <td>{{$data->lastticket->category_name}}</td>
                                                <td>{{$data->lastticket->subject}}</td>
                                                <td>{{$data->lastticket->description}}</td>
                                                <td>{{$data->lastticket->due_date}}</td>
                                                <td>{{$data->lastticket->assigned_first_name}} {{$data->lastticket->assigned_last_name}}</td>
                                                <td>{{$data->lastticket->created_at}}</td>
                                                <td>{{$data->lastticket->updated_first_name}} {{$data->lastticket->updated_last_name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <br/>

                        <div class="card">
                            <div class="card-header">Your Open Tickets</div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover DataTable">
                                        <thead>
                                        <tr>
                                        <!-- id	PO_Number	invoice_Number	order_date	company_id	user_id	address_id	created_user_id	updated_by_user_id	created_at	updated_at -->

                                            <!-- <th>ID</th> -->
                                            <th>GUID</th>
                                            <th>Category</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th>Assigned To</th>
                                            <th>Created At</th>
                                            <th>Updated By</th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($data->tickets as $ticket)
                                            <tr>
                                                <td><a href="{{ url('ticket/'.$ticket->ticket_guid) }}" > {{$ticket->ticket_guid}}</a></td>
                                                <td>{{$ticket->category_name}}</td>
                                                <td>{{$ticket->subject}}</td>
                                                <td>{{$ticket->description}}</td>
                                                <td>{{$ticket->due_date}}</td>
                                                <td>{{$ticket->assigned_first_name}} {{$ticket->assigned_last_name}}</td>
                                                <td>{{$ticket->created_at}}</td>
                                                <td>{{$ticket->updated_first_name}} {{$ticket->updated_last_name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        
                                {{ $data->tickets->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
