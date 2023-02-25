<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMaster extends Model
{
    use HasFactory;
    protected $table = 'food_masters';
    protected $fillable = [
        'food_name',
        'calories',
        'protein',
        'carbs',
        'fats',
        'fiber',
        'status',
        'created_at',
        'updated_at'
    ];
}