<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname_1',
        'lastname_2',
        'tipo_usuario_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class);
    }

    public function producto()
    {
        return $this->hasOne(Producto::class);
    }

    public function adminlte_image(){
        return '/img/user-default.jpg';
    }
    public function adminlte_desc(){
        return 'Administrador';
    }

    public function adminlte_profile_url(){
        return 'ss/bb';
    }
}
