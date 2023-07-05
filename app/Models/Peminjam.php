<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Peminjam extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'peminjam';

    protected $fillable = [
        'name', 'nim', 'email', 'program_studi', 'fakultas', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
