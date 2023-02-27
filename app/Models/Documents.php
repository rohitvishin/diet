<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'client_id',
        'document_date',
        'document_name',
        'document_url',
        'created_at',
        'updated_at'
    ];
}