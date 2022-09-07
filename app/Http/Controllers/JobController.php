<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    // RETORNA TODOS OS CARGOS
    public function index()
    {
        $jobs = Job::get()->toJson(JSON_PRETTY_PRINT);
        return response($jobs, 200);
    }

    // RETORNA CARGO POR JOB_ID
    public function show($job){

        if (Job::where('job_id', $job)->exists()) {
            $job = Job::where('job_id', $job)->get()->toJson(JSON_PRETTY_PRINT);
            return response($job, 200);
          } else {
            return response()->json([
              "message" => "Cargo Não Encontrado!"
            ], 404);
          }
    }

    // CADASTRA CARGO
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

    // CHAMA CARGO A SER EDITADO
    public function edit($job){
        $job = Job::findOrFail($job);
        return $job;

    }

    // ATUALIZA CARGO
    public function update(Request $request, $job)
    {
        if (Job::where('job_id', $job)->exists()) {
            $job = Job::findOrFail($job);

            $job->job_title = is_null($request->job_title) ? $job->job_title : $request->job_title;
            $job->min_salary = is_null($request->min_salary) ? $job->min_salary : $request->min_salary;
            $job->max_salary = is_null($request->max_salary) ? $job->max_salary : $request->max_salary;
            $job->save();

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
