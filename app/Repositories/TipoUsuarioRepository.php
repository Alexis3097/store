<?php


namespace App\Repositories;
use App\IRepositories\ITipoUsuarioRepository;
use App\Models\TipoUsuario;

class TipoUsuarioRepository implements ITipoUsuarioRepository
{

    public function all()
    {
        return TipoUsuario::all();
    }
}
