@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Ticket Details:</div>

                <div class="card-body">
                @if (empty($data->ticket->ticket_guid))
                    
                    <span class="" role="alert">
                        <strong>Please provide a valid "Ticket Guid" to view the detials</strong>
                        <strong>
                                    <a class="dropdown-item" href="{{ route('tickets') }}">
                                        View Your Tickets
                                    </a>
                        </strong>
                    </span>
                @else
                    <form method="POST" action="{{ route('update-ticket') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="GUID" class="col-md-4 col-form-label text-md-right">{{ __('GUID') }}</label>

                            <div class="col-md-6">
                                <input id="GUID" type="text" class="form-control @error('GUID') is-invalid @enderror" name="GUID" value="{{ $data->ticket->ticket_guid }}" required autocomplete="ticket_guid" disabled>
                            </div>
                        </div>

                        <!-- Authentication Links -->
                        @guest
                            <div class="form-group row">
                                <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                <input id="Status" type="text" class="form-control @error('Status') is-invalid @enderror" name="Status" value="{{ $data->ticket->status_name }}" required autocomplete="Status" disabled>
                                </div>
                            </div>
                        @else
                            @if (Auth::user()->role_id == 1)
                                
                                <div class="form-group row">
                                    <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="col-md-6">                                        
                                        <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id" required autocomplete="status_id">
                                            <option value="{{$data->ticket->status_id }}" readonly="true" selected="true">-- {{$data->ticket->status_name }} --</option>
                                            @foreach ($data->statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            @elseif (Auth::user()->id == $data->ticket->created_id)
                            
                                <div class="form-group row">
                                    <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="col-md-6">                                        
                                        <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id" required autocomplete="status_id">
                                            <option value="{{$data->ticket->status_id }}" readonly="true" selected="true">-- {{$data->ticket->status_name }} --</option>
                                            <option value="{{$data->status_res->id}}">{{$data->status_res->name}}</option>
                                        </select>
                                        @error('status_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="col-md-6">
                                    <input id="Status" type="text" class="form-control @error('Status') is-invalid @enderror" name="Status" value="{{ $data->ticket->status_name }}" required autocomplete="Status" disabled>
                                    </div>
                                </div>
                            @endif
                        @endguest

                        <!-- Authentication Links -->
                        @guest
                            <div class="form-group row">
                                <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <input id="Category" type="text" class="form-control @error('Category') is-invalid @enderror" name="Category" value="{{ $data->ticket->category_name }}" required autocomplete="category_name" disabled>
                                </div>
                            </div>
                        @else
                            @if (Auth::user()->role_id == 1)
                                
                                <div class="form-group row">
                                    <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <select id="ticket_category_id" class="form-control @error('ticket_category_id') is-invalid @enderror" name="ticket_category_id" required autocomplete="ticket_category_id">
                                            <option value="{{ $data->ticket->category_id }}" readonly="true" selected="true">-- {{$data->ticket->category_name }} --</option>
                                            @foreach ($data->categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('ticket_category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            @else
                                <div class="form-group row">
                                    <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <input id="Category" type="text" class="form-control @error('Category') is-invalid @enderror" name="Category" value="{{ $data->ticket->category_name }}" required autocomplete="category_name" disabled>
                                        <input id="ticket_category_id" type="hidden" class="form-control @error('Category') is-invalid @enderror" name="ticket_category_id" value="{{ $data->ticket->category_id }}" required autocomplete="category_name">
                                    
                                        @error('ticket_category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endguest

                        <div class="form-group row">
                            <label for="LogedBy" class="col-md-4 col-form-label text-md-right">{{ __('Loged By') }}</label>

                            <div class="col-md-6">
                                <input id="LogedBy" type="text" class="form-control @error('LogedBy') is-invalid @enderror" name="LogedBy" value="{{ $data->ticket->created_first_name }} {{ $data->ticket->created_last_name }}" required autocomplete="created_name" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="Subject" type="text" class="form-control @error('Subject') is-invalid @enderror" name="Subject" value="{{ $data->ticket->subject }}" required autocomplete="Subject" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" required autocomplete="Description" disabled>{{ $data->ticket->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DueDate" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>

                            <div class="col-md-6">
                            <input id="DueDate" type="text" class="form-control @error('DueDate') is-invalid @enderror" name="DueDate" value="{{ $data->ticket->due_date }}" required autocomplete="DueDate" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                            <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ $data->ticket->formatted_address }}" required autocomplete="Address" disabled>
                            </div>
                        </div>

                        @guest
                            <div class="form-group row">
                                <label for="AssignedTo" class="col-md-4 col-form-label text-md-right">{{ __('Assigned To') }}</label>

                                <div class="col-md-6">
                                <input id="AssignedTo" type="text" class="form-control @error('AssignedTo') is-invalid @enderror" name="AssignedTo" value="{{$data->ticket->assigned_first_name}} {{$data->ticket->assigned_last_name}}" required autocomplete="AssignedTo" disabled>
                                </div>
                            </div>
                        @else
                            @if (Auth::user()->role_id == 1)
                                <div class="form-group row">
                                    <label for="assigned_user_id" class="col-md-4 col-form-label text-md-right">{{ __('Assigned To') }}</label>

                                    <div class="col-md-6">
                                        <select id="assigned_user_id" class="form-control @error('assigned_user_id') is-invalid @enderror" name="assigned_user_id" required autocomplete="assigned_user_id">
                                            <option value="{{ $data->ticket->assigned_id }}" readonly="true" selected="true">-- {{$data->ticket->assigned_first_name}} {{$data->ticket->assigned_last_name}} --</option>
                                            @foreach ($data->users as $user)
                                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="AssignedTo" class="col-md-4 col-form-label text-md-right">{{ __('Assigned To') }}</label>

                                    <div class="col-md-6">
                                    <input id="AssignedTo" type="text" class="form-control @error('AssignedTo') is-invalid @enderror" name="AssignedTo" value="{{$data->ticket->assigned_first_name}} {{$data->ticket->assigned_last_name}}" required autocomplete="AssignedTo" disabled>
                                    </div>
                                </div>
                            @endif
                        @endguest

                        <div class="form-group row">
                            <label for="CreatedAt" class="col-md-4 col-form-label text-md-right">{{ __('Created At') }}</label>

                            <div class="col-md-6">
                            <input id="CreatedAt" type="text" class="form-control @error('CreatedAt') is-invalid @enderror" name="CreatedAt" value="{{$data->ticket->created_at}}" required autocomplete="CreatedAt" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="UpdatedBy" class="col-md-4 col-form-label text-md-right">{{ __('Updated By') }}</label>

                            <div class="col-md-6">
                            <input id="UpdatedBy" type="text" class="form-control @error('UpdatedBy') is-invalid @enderror" name="UpdatedBy" value="{{$data->ticket->updated_first_name}} {{$data->ticket->updated_last_name}}" required autocomplete="UpdatedBy" disabled>
                            </div>
                        </div>

                        <!-- Authentication Links -->
                        @guest

                        @else
                            @if (Auth::user()->role_id == 1)
                                
                                <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $data->ticket->id }}" required autocomplete="id">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                                
                            @elseif (Auth::user()->id == $data->ticket->created_id)

                                <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $data->ticket->id }}" required autocomplete="id">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>

                            @endif
                        @endguest
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
