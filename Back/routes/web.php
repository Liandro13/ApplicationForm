<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidaturaController;

Route::get('/candidaturas', [CandidaturaController::class, 'index'])->name('candidaturas.index');
Route::get('/candidaturas/create', [CandidaturaController::class, 'create'])->name('candidaturas.create');
Route::post('/candidaturas', [CandidaturaController::class, 'store'])->name('candidaturas.store');
Route::get('/candidaturas/{candidatura}', [CandidaturaController::class, 'show'])->name('candidaturas.show');
Route::get('/candidaturas/{candidatura}/edit', [CandidaturaController::class, 'edit'])->name('candidaturas.edit');
Route::put('/candidaturas/{candidatura}', [CandidaturaController::class, 'update'])->name('candidaturas.update');
Route::delete('/candidaturas/{candidatura}', [CandidaturaController::class, 'destroy'])->name('candidaturas.destroy');

