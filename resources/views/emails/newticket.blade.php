@component('mail::message')
# New Ticket

## Ticket GUID: {{ $data->NewTicket->ticket_guid }}

### Ticket Details:
	Subject: {{ $data->NewTicket->subject }}
	Description: {{ $data->NewTicket->description }}
	Due Date: {{ $data->NewTicket->due_date }}
	Address: {{ $data->NewTicket->formatted_address }}
----------------

@component('mail::button', ['url' => url('/ticket/'.$data->NewTicket->ticket_guid )])
View Ticket
@endcomponent

Thanks,<br/>
{{ config('app.name') }}
@endcomponent
