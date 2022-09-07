<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobs', [jobController::class, 'index']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job_id}', [JobController::class, 'show']);
Route::get('/jobs/{job_id}/edit', [JobController::class, 'edit']);
Route::put('/jobs/{job_id}', [JobController::class, 'update']);
Route::delete('/jobs/{job_id}', [JobController::class, 'destroy']);

Route::get('/employees', [jobController::class, 'index']);
Route::post('/employees', [JobController::class, 'store']);
Route::get('/employees/{employee_id}', [JobController::class, 'show']);
Route::get('/employees/{employee_id/edit', [JobController::class, 'edit']);
Route::put('/employees/{employee_id}', [JobController::class, 'update']);
Route::delete('/employees/{employee_id}', [JobController::class, 'destroy']);
