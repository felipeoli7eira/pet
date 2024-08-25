<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pet extends Authenticatable
{
    protected $fillable = [
        'nome',
        'idade_mes',
        'idade_ano',
        'pettipo_id',
        'cliente_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
