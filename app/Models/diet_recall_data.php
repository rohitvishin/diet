<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet_recall_data extends Model
{
    use HasFactory;
    protected $table = 'diet_recall_datas';
    protected $guarded = [];

    protected $casts = [
        'meal_out' => 'array',
        'water_intake' => 'array',
        'fried_food' => 'array',
        'choclate' => 'array',
        'juices' => 'array',
        'junk_foods' => 'array',
        'bread' => 'array',
        'potato' => 'array',
        'chesse' => 'array',
        'oil' => 'array',
        'ghee' => 'array',
        'alcohol' => 'array',
        'smoking' => 'array',
        'crabs' => 'array',
        'protien' => 'array',
        'milk' => 'array',
        'veg' => 'array',
        'fruits' => 'array',
        'protien_powder' => 'array',
        'nuts' => 'array',
    ];
}