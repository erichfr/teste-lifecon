<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/jobs', [JobController::class, 'index']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job_id}', [JobController::class, 'show']);
Route::get('/jobs/{job_id}/edit', [JobController::class, 'edit']);
Route::put('/jobs/{job_id}', [JobController::class, 'update']);
Route::delete('/jobs/{job_id}', [JobController::class, 'destroy']);

Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::get('/employees/{employee_id}', [EmployeeController::class, 'show']);
Route::get('/employees/{employee_id/edit', [EmployeeController::class, 'edit']);
Route::put('/employees/{employee_id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{employee_id}', [EmployeeController::class, 'destroy']);
