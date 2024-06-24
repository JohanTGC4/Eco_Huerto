<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    protected $fillable = [
        'usuario', 'correo', 'contrasena',
    ];

    protected $hidden = [
        'contrasena', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['contrasena'] = Hash::make($password);
    }
}
