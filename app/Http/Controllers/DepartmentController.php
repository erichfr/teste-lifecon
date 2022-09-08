<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{

    // RETORNA TODOS OS CARGOS
    public function index()
    {
        $department = Department::get()->toJson(JSON_PRETTY_PRINT);
        return response($department, 200);
    }

    // RETORNA CARGO POR JOB_ID
    public function show($department){

        if (Department::where('department_id', $department)->exists()) {
            $department = Department::where('department_id', $department)->get()->toJson(JSON_PRETTY_PRINT);
            return response($department, 200);
          } else {
            return response()->json([
              "message" => "Cargo Não Encontrado!"
            ], 404);
          }
    }

    // CADASTRA CARGO
    public function store()
    {
        $department = [
            'department_id' => request('department_id'),
            'department_name' => request('department_name'),
            'location_id' => request('location_id')
            ];
            Department::create($department);
            return response()->json([
                "message" => "Cargo Registrado com Sucesso!"
              ], 201);
    }

    // CHAMA CARGO A SER EDITADO
    public function edit(Department $department){
        $department = Department::findOrFail($department);
        return $department;

    }

    // ATUALIZA CARGO
    public function update(Request $request, Department $department)
    {
        if($department->update($request->all())) {
            return response()->json([
                "message" => "Cargo Atualizado com Sucesso!"
              ], 200);
        } else {
            return response()->json([
                "message" => "Cargo Não Atualizado!"
              ], 404);
        }
    }

    // DELETA CARGO
    public function destroy($department)
    {
        if(Department::where('department_id', $department)->exists()) {
            $department = Department::find($department);
            $department->delete();

            return response()->json([
              "message" => "Cargo Deletado!"
            ], 202);
          } else {
            return response()->json([
              "message" => "Cargo Não Encontrado!"
            ], 404);
          }

    }
}
