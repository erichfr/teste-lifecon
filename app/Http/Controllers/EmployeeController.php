<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Department;

class EmployeeController extends Controller
{
    // RETORNA TODOS OS FUNCIONÁRIOS
    public function index()
    {
        $employee = Employee::get()->toJson(JSON_PRETTY_PRINT);
        return response($employee, 200);
    }

    // RETORNA FUNCIONÁRIO POR EMPLOYEE_ID
    public function show($employee){

        if (Employee::where('employee_id', $employee)->exists()) {
            $employee = Employee::where('employee_id', $employee)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee, 200);
          } else {
            return response()->json([
              "message" => "Funcionário Não Encontrado!"
            ], 404);
          }
    }

    // CADASTRA FUNCIONÁRIO
    public function store()
    {
        $employee = [
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'hire_date' => request('hire_date'),
            'job_id' => request('job_id'),
            'salary' => request('salary')
            ];
            Employee::create($employee);
            return response()->json([
                "message" => "Funcionário Registrado com Sucesso!"
              ], 201);
    }

    // CHAMA FUNCIONÁRIO A SER EDITADO
    public function edit($employee){
        $employee = Employee::findOrFail($employee);
        return $employee;

    }

    // ATUALIZA FUNCIONÁRIO
    public function update(Request $request, Employee $employee)
    {
        if($employee->update($request->all())) {
            print_r($request);
            die;
            return response()->json([
                "message" => "Cargo Atualizado com Sucesso!"
              ], 200);
        } else {
            return response()->json([
                "message" => "Cargo Não Atualizado!"
              ], 404);
        }
    }

    // DELETA FUNCIONÁRIO
    public function destroy($employee)
    {
        if(Employee::where('employee_id', $employee)->exists()) {
            $employee = Employee::find($employee);
            $employee->delete();

            return response()->json([
              "message" => "Cargo Deletado!"
            ], 202);
          } else {
            return response()->json([
              "message" => "Funcionário Não Encontrado!"
            ], 404);
          }

    }
}
