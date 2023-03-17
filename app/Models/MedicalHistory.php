<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'chronic_diseases',
        'bone_health',
        'gastro_instestinal',
        'others',
        'medical_prob',
        'food_allergy',
        'hopitalised',
        'past_surgery',
        'father_side',
        'mother_side',
        'cold_cough_flu',
        'family_doc_details',
        'delivery_yrs',
        'periods_timeline',
        'periods_symtoms',
        'created_at',
        'updated_at',
    ]; 
}