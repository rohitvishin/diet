<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet_followed_data extends Model
{
    use HasFactory;

    protected $table = 'diet_followed_datas';
    protected $fillable = [
        'diet_followed_date',
        'client_id',
        'diet_followed_type',
        'vitamins',
        'general_health',
        'reports',
        'met_dr',
        'food_plan',
        'meal_timing',
        'portion_control',
        'carbs',
        'protiens',
        'fried',
        'desserts',
        'other_cheatings',
        'meal_out',
        'alchol',
        'travel',
        'diet_plan_percentage',
        'remarks',
        'created_at',
        'update_at'
    ];
}