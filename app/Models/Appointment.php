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
        'customer_name',
        'customer_mobile',
        'date',
        'start_time',
        'end_time',
        'status',
    ];
}
