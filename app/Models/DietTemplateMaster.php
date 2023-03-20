<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietTemplateMaster extends Model
{
    use HasFactory;
    protected $table = 'diet_template_masters';
    protected $fillable = [
        'plan_name',
        'plan_intro',
        'diet_chart_template',
        'created_at',
        'update_at'
    ];
}