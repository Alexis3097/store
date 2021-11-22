<?php


namespace App\Repositories;
use App\IRepositories\ICategoriaRepository;
use App\Models\CategoriaProducto;
use Throwable;
use Illuminate\Database\Eloquent\Builder;
class CategoriaRepository implements ICategoriaRepository
{

    public function all()
    {
        return CategoriaProducto::paginate(10);
    }

    public  function allActive(){
        return CategoriaProducto::where('activa',1)->get();
    }
    public function create($data)
    {
        try {
            return CategoriaProducto::create([
                'nombre'=>$data->nombre,
                'activa'=> $data->activa == 'true',
            ]);
        }catch (Throwable $e){
            return null;
        }
    }

    public function show($id)
    {
       return CategoriaProducto::find($id);
    }

    public function update($id, $data)
    {
        try {
            $categoria = CategoriaProducto::find($id);
            $categoria->nombre = $data->nombre;
            $categoria->activa = $data->activa == 'true';
            return $categoria->save();
        }catch (Throwable $e){
            return null;
        }
    }

    public function delete($id)
    {
        try {
            return  CategoriaProducto::find($id)->delete();
        }catch (Throwable $e){
            return false;
        }
    }

    public function getCategoriasConProductos(){
        $categorias = CategoriaProducto::whereHas('producto', function (Builder $query) {
            $query->where('foto_ruta', '!=', null);
        })->get();
        return $categorias;
    }

    public function buscarCategoria($query)
    {
        return CategoriaProducto::where('nombre', 'like','%' .$query. '%')->get();
    }
}

