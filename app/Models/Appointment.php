<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'client_id',
        'client_mobile',
        'client_name',
        'appointment_date',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'status',
    ];
}