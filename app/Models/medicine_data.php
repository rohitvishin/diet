<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine_data extends Model
{
    use HasFactory;
    protected $table = 'medicine_datas';
    protected $fillable = [
        'medicine_date',
        'client_id',
        'medicine_name',
        'time_to_take',
        'created_at',
        'update_at'
    ];
}