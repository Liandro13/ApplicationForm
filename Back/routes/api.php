<?php
// routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\CandidaturaApiController;


Route::get('/candidaturas/check-email', function (Request $request, CandidaturaApiController $controller) {
    Log::info('Check email route hit', ['email' => $request->query('email')]);
    return $controller->checkEmail($request);
});

Route::get('/candidaturas', [CandidaturaApiController::class, 'index']);
Route::post('/candidaturas', [CandidaturaApiController::class, 'store']);
Route::get('/candidaturas/{candidatura}', [CandidaturaApiController::class, 'show']);
Route::put('/candidaturas/{candidatura}', [CandidaturaApiController::class, 'update']);
Route::delete('/candidaturas/{candidatura}', [CandidaturaApiController::class, 'destroy']);


Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});