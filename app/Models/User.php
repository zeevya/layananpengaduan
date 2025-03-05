<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'name', 'nip', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed', // Untuk otomatis mengenkripsi password (hanya di Laravel 10+)
    ];
}