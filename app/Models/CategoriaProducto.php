<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProducto extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'categoria_productos';
    use HasFactory;
    protected $fillable = [
        'nombre',
        'activa',
    ];

    public function producto()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
