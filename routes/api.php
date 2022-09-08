<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::get('/jobs', [JobController::class, 'index']); // => FUNCIONANDO
Route::post('/jobs', [JobController::class, 'store']); // => FUNCIONANDO
Route::get('/jobs/{job}', [JobController::class, 'show']); // => FUNCIONANDO
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']); // => NÃO ESTÁ FUNCIONANDO
Route::put('/jobs/{job}', [JobController::class, 'update']); // FUNCIONANDO
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); // => FUNCIONANDO

Route::get('/employees', [EmployeeController::class, 'index']); // => FUNCIONANDO
Route::post('/employees', [EmployeeController::class, 'store']); // => FUMCIONANDO
Route::get('/employees/{employee_id}', [EmployeeController::class, 'show']); // FUNCIONA, MAS O ID DO CARGO DEVE EXISTIR. O EMPREGADO DEVE SER CADASTRADO PRIMEIRO
Route::get('/employees/{employee_id/edit', [EmployeeController::class, 'edit']); // NÃO ESTÁ FUNCIONANDO
Route::put('/employees/{employee_id}', [EmployeeController::class, 'update']); // NÃO ESTÁ FUNCIONANDO
Route::delete('/employees/{employee_id}', [EmployeeController::class, 'destroy']);

Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/departments', [DepartmentController::class, 'store']);
Route::get('/departments/{department_id}', [DepartmentController::class, 'show']);
Route::patch('/departments/{department_id}', [DepartmentController::class, 'edit']);
Route::put('/departments/{department_id}', [DepartmentController::class, 'update']);
Route::delete('/departments/{department_id}', [DepartmentController::class, 'destroy']);
