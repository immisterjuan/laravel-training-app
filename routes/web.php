<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tickets', TicketsController::class);