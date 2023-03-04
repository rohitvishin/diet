<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab_data extends Model
{
    use HasFactory;
    protected $table = 'lab_datas';
    protected $fillable = [
        'lab_test_date',
        'client_id',
        'test_name',
        'test_result',
        'created_at',
        'update_at'
    ];
}