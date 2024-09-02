<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

use App\Http\Controllers\CandidaturaController;
Route::apiResource('candidaturas', CandidaturaController::class);

Route::get('/candidaturas', [CandidaturaController::class, 'index'])->name('candidaturas.index');
Route::get('/candidaturas/create', [CandidaturaController::class, 'create'])->name('candidaturas.create');
Route::post('/candidaturas', [CandidaturaController::class, 'store'])->name('candidaturas.store');
Route::get('/candidaturas/{candidatura}', [CandidaturaController::class, 'show'])->name('candidaturas.show');
Route::get('/candidaturas/{candidatura}/edit', [CandidaturaController::class, 'edit'])->name('candidaturas.edit');
Route::put('/candidaturas/{candidatura}', [CandidaturaController::class, 'update'])->name('candidaturas.update');
Route::delete('/candidaturas/{candidatura}', [CandidaturaController::class, 'destroy'])->name('candidaturas.destroy');

