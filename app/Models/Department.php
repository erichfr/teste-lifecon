<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_id',
        'department_name',
        'location_id'
    ];

    /* public function departments() {
        return $this->hasMany(Employes::class);
    } */
}
