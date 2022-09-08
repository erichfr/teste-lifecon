<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Models\Job;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/jobs', function(Request $request) {

    $query = Job::query();
    if ($request->has('job_id')) {
        $query->where('job_id', '=' , $request->job_id);
    }
    if ($request->has('job_title')) {
            $query->where('job_title', '=' , $request->job_title);
    }
    if ($request->has('min_salary')) {
        $query->where('min_salary', '=' , $request->min_salary);
    }
    if ($request->has('max_salary')) {
        $query->where('max_salary', '=' , $request->max_salary);
    }

    $job = $query->get();
        return $job;
});
Route::post('/jobs', [JobController::class, 'store']); // => FUNCIONANDO
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']); // => NÃO ESTÁ FUNCIONANDO
Route::put('/jobs/{job}', [JobController::class, 'update']); // FUNCIONANDO
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); // => FUNCIONANDO

Route::get('/employees', function(Request $request) {

    $query = Employee::query();
    if ($request->has('employee_id')) {
        $query->where('employee_id', '=' , $request->employee_id);
    }
    if ($request->has('first_name')) {
            $query->where('first_name', '=' , $request->first_name);
    }
    if ($request->has('last_name')) {
        $query->where('last_name', '=' , $request->last_name);
    }
    if ($request->has('email')) {
        $query->where('email', '=' , $request->email);
    }
    if ($request->has('phone_number')) {
        $query->where('phone_number', '=' , $request->phone_number);
    }
    if ($request->has('hire_date')) {
        $query->where('hire_date', '=' , $request->hire_date);
    }
    if ($request->has('job_id')) {
        $query->where('job_id', '=' , $request->job_id);
    }
    if ($request->has('salary')) {
        $query->where('salary', '=' , $request->salary);
    }
    if ($request->has('department_id')) {
        $query->where('department_id', '=' , $request->department_id);
    }

    $employee = $query->get();
        return $employee;
});
Route::get('/employees/{employee_id}', [EmployeeController::class, 'show']); // FUNCIONA, MAS O ID DO CARGO DEVE EXISTIR. O EMPREGADO DEVE SER CADASTRADO PRIMEIRO
Route::get('/employees/{employee_id/edit', [EmployeeController::class, 'edit']); // NÃO ESTÁ FUNCIONANDO
Route::put('/employees/{employee_id}', [EmployeeController::class, 'update']); // NÃO ESTÁ FUNCIONANDO
Route::delete('/employees/{employee_id}', [EmployeeController::class, 'destroy']);

// Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/departments', function(Request $request) {

    $query = Department::query();
    if ($request->has('department_id')) {
        $query->where('department_id', '=' , $request->department_id);
    }
    if ($request->has('department_name')) {
            $query->where('department_name', '=' , $request->department_name);
    }
    if ($request->has('location_id')) {
        $query->where('location_id', '=' , $request->location_id);
    }


    $department = $query->get();
        return $department;
});
Route::post('/departments', [DepartmentController::class, 'store']);
Route::get('/departments/{department_id}', [DepartmentController::class, 'show']);
Route::patch('/departments/{department_id}', [DepartmentController::class, 'edit']);
Route::put('/departments/{department_id}', [DepartmentController::class, 'update']);
Route::delete('/departments/{department_id}', [DepartmentController::class, 'destroy']);
