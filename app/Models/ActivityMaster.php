<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityMaster extends Model
{
    use HasFactory;

    protected $table = 'activity_masters';
    protected $fillable = [
        'name',
        'status'
    ];
}