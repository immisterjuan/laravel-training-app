@extends('layouts.app')
@section('title','New Ticket')
@section('head')
<style></style>
@endsection
@section('content')
<div class="shadow-sm rounded-md p-4 mb-4 w-full">
    <a href="{{ route('tickets.create') }}" class="inline-block px-3 py-2 rounded-md text-sm text-white bg-blue-500 hover:bg-blue-800 focus:outline-none cursor-pointer">
        Add Ticket
    </a>
</div>
<div class="bg-white shadow-sm rounded-md overflow-x-auto p-10">
    <form method="post" action="{{ route('tickets.store') }}">
        @csrf
        <div class="mb-3">
            <label for="ticket-type" class="mr-6 text-sm">Type</label>
            <select
                name="ticket_type"
                id="ticket-type"
                class="border border-gray-300 rounded min-w-50 p-1"
                required
                {{ isset($ticket) ? 'disabled' : ''  }}
            >

                <option value="" default></option>
                <option value="it"{{ isset($ticket) && $ticket->ticket_type === 'it' ? ' selected' : ''}}>IT</option>
                <option value="accounting"{{ isset($ticket) && $ticket->ticket_type === 'accounting' ? ' selected' : ''}}>Accounting</option>
                <option value="hr"{{ isset($ticket) && $ticket->ticket_type === 'hr' ? ' selected' : ''}}>HR</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ticket-desc" class="mr-6 text-sm">Description</label>
            <textarea
                name="ticket_desc"
                id="ticket-desc"
                class="border border-gray-300 rounded min-h-50 w-full p-1"
                required
                {{ isset($ticket) ? 'disabled' : ''  }}
            >{{ $ticket->ticket_desc ?? ''  }}</textarea>
        </div>
        <div class="mb-3">
            <label for="ticket-status" class="mr-6 text-sm">Status</label>
            <select
                name="status"
                id="ticket-status"
                class="border border-gray-300 rounded min-w-50 p-1"
                {{ isset($ticket) ? 'disabled' : ''  }}
            >

                <option value="draft" default{{ isset($ticket) && $ticket->status === 'draft' ? ' selected' : ''}}>Draft</option>
                <option value="open"{{ isset($ticket) && $ticket->status === 'open' ? ' selected' : ''}}>Open</option>
                <option value="pending"{{ isset($ticket) && $ticket->status === 'pending' ? ' selected' : ''}}>Pending</option>
                <option value="ongoing"{{ isset($ticket) && $ticket->status === 'ongoing' ? ' selected' : ''}}>Ongoing</option>
                <option value="cancelled"{{ isset($ticket) && $ticket->status === 'cancelled' ? ' selected' : ''}}>Cancelled</option>
                <option value="close"{{ isset($ticket) && $ticket->status === 'close' ? ' selected' : ''}}>Close</option>
            </select>
        </div>
        @if(!isset($ticket))
        <div class="mb-3">
            <button
                type="submit"
                class="text-lg bg-blue-700 hover:bg-blue-800 text-white py-1 px-5 rounded w-full">
                Save
            </button>
        </div>
        @endif
    </form>
</div>
@endsection