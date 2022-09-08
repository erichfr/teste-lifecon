<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_id',
        'job_title',
        'min_salary',
        'max_salary'
    ];

    public function employe() {
        return $this->belongsTo(Employe::class);
    }
    public function job() {
        return $this->belongsTo(Job::class);
    }
}
