@extends('layouts.app')
@section('title','Ticket Lists')
@section('head')
<style></style>
@endsection
@section('content')
    @if (session('message'))
        <div class="bg-red-100 text-white shadow-sm rounded-md overflow-x-auto">
            {{ session('message') }}
        </div>
    @endif
    @include('tickets.parts.toolbar', ['id' => isset($id) ? $id : null])
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
                                    class="text-xs bg-gray-300 hover:bg-gray-400 inline-block py-1 px-2 rounded mr-1 cursor-pointer mb-2"
                                >View</a>
                                <a
                                    href="{{ route('tickets.edit', [$ticket->id]) }}"
                                    class="text-xs bg-gray-300 hover:bg-gray-400 inline-block py-1 px-2 rounded mr-1 cursor-pointer mb-2"
                                >Edit</a>
                                <form method="post" action="{{ route('tickets.destroy', [$ticket->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-xs bg-red-500 hover:bg-red-5 text-white inline-block py-1 px-2 rounded cursor-pointer  mb-2"
                                    >Delete</button>
                                </form>
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
        <div class="p-2 border-t border-t-gray-300">
            {{ $tickets->links() }}
        </div>
    </div>
@endsection