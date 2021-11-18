<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'producto';
    protected $fillable = [
        'user_id',
        'categoria_id',
        'tipo_pago_id',
        'nombre',
        'descripcion',
        'foto_ruta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoriaProducto()
    {
        return $this->belongsTo(CategoriaProducto::class);
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }
}
