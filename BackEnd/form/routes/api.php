<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidaturaController;

Route::apiResource('candidaturas', CandidaturaController::class);


