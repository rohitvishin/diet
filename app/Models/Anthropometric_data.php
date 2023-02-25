<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anthropometric_data extends Model
{
    use HasFactory;
    protected $table = 'anthropometric_datas';
    protected $fillable = [
        'anthro_date',
        'client_id',
        'weight',
        'fat',
        'body_water',
        'muscle_mass',
        'chest',
        'upper_waist',
        'hips',
        'lower_waist',
        'bmr',
        'height_cm',
        'height',
    ];
}