<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'pay_id',
        'product_id',
        'qty',
        'amount',
        'discount',
        'final_amt',
        'created_date',
        'updated_at'
    ];
}