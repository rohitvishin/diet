<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'dev_id',
        'user_id',
        'appointment_id',
        'package_id',
        'final_amt',
        'start_date',
        'confirmation_date',
        'payment_method',
        'transaction_id',
        'no_emi',
        'down_payment'
    ];
}
