<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet_chart_data extends Model
{
    use HasFactory;
    protected $table = 'diet_chart_datas';
    protected $fillable = [
        'diet_chart_date',
        'client_id',
        'plan_name',
        'plan_intro',
        'template_id',
        'diet_chart',
        'created_at',
        'update_at'
    ];
}