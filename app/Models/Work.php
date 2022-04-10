<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date:T-m-d',
        'first_in_time' => 'datetime:H:i',
        'last_out_time' => 'datetime:H:i',
    ];

    protected $fillable = [
        'month',
        'day',
        'date',
        'employee_id',
        'employee_name',
        'department',
        'first_in_time',
        'last_out_time',
        'hour_of_work',
    ];
}
