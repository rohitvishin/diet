<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dev extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard ="dev";

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'username',
        'register_ip',
        'wallet',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
