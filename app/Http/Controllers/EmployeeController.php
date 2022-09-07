<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // RETORNA TODOS OS FUNCIONÁRIO
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
    public function update(Request $request, $employee)
    {
        if (Employee::where('employee_id', $employee)->exists()) {
            $employee = Employee::findOrFail($employee);

            $employee->first_name = is_null($request->first_name) ? $employee->first_name : $request->first_name;
            $employee->last_name = is_null($request->last_name) ? $employee->last_name : $request->last_name;
            $employee->email = is_null($request->email) ? $employee->email : $request->email;
            $employee->phone_number = is_null($request->phone_number) ? $employee->phone_number : $request->phone_number;
            $employee->hire_date = is_null($request->hire_date) ? $employee->hire_date : $request->hire_date;
            $employee->job_id = is_null($request->job_id) ? $employee->job_id : $request->job_id;
            $employee->salary = is_null($request->salary) ? $employee->salary : $request->salary;
            $employee->save();

            return response()->json([
              "message" => "Funcionário Atualizado com Sucesso!"
            ], 200);
          } else {
            return response()->json([
              "message" => "Funcionário Não Atualizado!"
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
