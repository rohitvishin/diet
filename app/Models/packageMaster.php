<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packageMaster extends Model
{
    use HasFactory;
    protected $table = 'package_masters';
    protected $fillable = [
        'plan_name',
        'duration',
        'discount',
        'amount',
        'currency',
        'tax',
        'status',
        'created_at',
        'updated_at'
    ];
}