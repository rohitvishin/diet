<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabMaster extends Model
{
    use HasFactory;
    protected $table = 'lab_masters';
    protected $fillable = [
        'test_type',
        'test_name',
        'subject',
        'subject_value',
        'subject_value_action',
        'result_low_range',
        'result_high_range',
        'unit'
    ];
}