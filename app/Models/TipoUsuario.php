<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    use HasFactory;
    protected $fillable = [
        'tipo',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
