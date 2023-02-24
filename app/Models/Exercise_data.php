<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise_data extends Model
{
    use HasFactory;
    protected $table = 'exercise_datas';
    protected $fillable = [
        'exercise_date',
        'client_id',
        'exercise_name',
        'exercise_unit',
        'exercise_duration'
    ];
}