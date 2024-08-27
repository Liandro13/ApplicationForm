<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

    
});


use App\Http\Controllers\CandidaturaController;

Route::resource('candidaturas', CandidaturaController::class);
