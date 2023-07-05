<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'pegawai';

    protected $fillable = [
        'name', 'nip', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
