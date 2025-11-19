@extends('layouts.app')
@section('title','Ticket Lists')
@section('head')
<style></style>
@endsection
@section('content')
    @include('tickets.parts.toolbar')
    <div class="bg-white shadow-sm rounded-md overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200" id="ticketsTable" role="table" aria-label="Tickets table">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">#</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Type</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Created</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Last Update</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @if($tickets->count() > 0)
                    @foreach($tickets as $ticket)
                        <tr>
                            <td class="px-4 py-3 text-left text-sm font-medium">#{{ $ticket->id }}</th>
                            <td class="px-4 py-3 text-left text-sm font-medium">{{ $ticket->ticket_type }}</td>
                            <td class="px-4 py-3 text-left text-sm font-medium">{{ $ticket->status }}</td>
                            <td class="px-4 py-3 text-left text-sm font-medium">{{ $ticket->created_at }}</td>
                            <td class="px-4 py-3 text-left text-sm font-medium">{{ $ticket->updated_at }}</td>
                            <td class="px-4 py-3 text-left text-sm font-medium">
                                <a
                                    href="{{ route('tickets.show', [$ticket->id]) }}"
                                    class="text-blue-700 hover:text-blue-800"
                                >View</a> |
                                <a
                                    href="{{ route('tickets.edit', [$ticket->id]) }}"
                                    class="text-blue-700 hover:text-blue-800"
                                >Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="s">
                            <div class="bg-color-yellow-300 p-1 rounded">No data available</div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection