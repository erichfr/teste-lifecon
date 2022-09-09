<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{

    public function index()
    {
        $employee = Employee::get()->toJson(JSON_PRETTY_PRINT);
        return response($employee, 200);
    }

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

    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::find($request->employee_id);
        $employee = Employee::findOrFail($request->employee_id);

        if($employee->fill($request->all())) {
            $employee->save();

            return response()->json([
                "message" => "Cargo Atualizado com Sucesso!"
              ], 200);
        } else {
            return response()->json([
                "message" => "Cargo Não Atualizado!"
              ], 404);
        }
    }

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
