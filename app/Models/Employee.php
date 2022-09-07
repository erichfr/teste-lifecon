<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary'
    ];

    /* public function departments() {
        return $this->hasMany(Department::class);
    }

    public function job() {
        return $this->belongsTo(Job::class);
    } */
}
