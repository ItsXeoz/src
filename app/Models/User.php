<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'photo_url',
        'status_login',
        'kode_jur',
        'angkatan',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // pastikan gunakan Laravel 10+
    ];

    public function getAuthIdentifierName()
    {
        return 'nim';
    }

    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class);
    }
}
