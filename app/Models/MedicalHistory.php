<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $table = 'medical_masters';
    protected $fillable = [
        'doctor_id',
        'user_id',
        'question_id',
        'answer'
    ];
}
