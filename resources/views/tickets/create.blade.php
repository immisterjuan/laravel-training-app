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
<div class="bg-white shadow-sm rounded-md overflow-x-auto">
</div>
@endsection