<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{

    public function index()
    {
        $department = Department::get()->toJson(JSON_PRETTY_PRINT);
        return response($department, 200);
    }

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

    public function update(Request $request, Department $department)
    {

        $department = Department::find($request->department_id);
        $department = Department::findOrFail($request->department_id);

        if($department->fill($request->all())) {
            $department->save();

            return response()->json([
                "message" => "Cargo Atualizado com Sucesso!"
              ], 200);
        } else {
            return response()->json([
                "message" => "Cargo Não Atualizado!"
              ], 404);
        }
    }

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
