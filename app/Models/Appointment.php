<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'doc_id',
        'client',
        'date',
        'start_time',
        'end_time',
        'status',
    ];
}
