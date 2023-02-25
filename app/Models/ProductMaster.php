<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    use HasFactory;
    protected $table = 'product_masters';
    protected $fillable = [
        'product_name',
        'unit',
        'amount',
        'qty',
        'discount',
        'status',
        'created_at',
        'updated_at'
    ];
}