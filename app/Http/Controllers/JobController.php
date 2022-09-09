<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::get()->toJson(JSON_PRETTY_PRINT);
        return response($jobs, 200);
    }

    public function store()
    {
        $job = [
            'job_title' => request('job_title'),
            'min_salary' => request('min_salary'),
            'max_salary' => request('max_salary')
            ];
            Job::create($job);
            return response()->json([
                "message" => "Cargo Registrado com Sucesso!"
              ], 201);
    }

    public function update(Request $request, Job $job)
    {
        if($job->update($request->all())) {
            return response()->json([
                "message" => "Cargo Atualizado com Sucesso!"
              ], 200);
        } else {
            return response()->json([
                "message" => "Cargo Não Atualizado!"
              ], 404);
        }
    }

    public function destroy($job)
    {
        if(Job::where('job_id', $job)->exists()) {
            $job = Job::find($job);
            $job->delete();

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
