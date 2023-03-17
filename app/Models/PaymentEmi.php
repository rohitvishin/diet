<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEmi extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'pay_id',
        'emi_amt',
        'emi_date'
    ];
}