<?php


namespace App\Repositories;

use App\IRepositories\IProductoRepository;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ProductoRepository implements IProductoRepository
{

    public function all()
    {
        return Producto::paginate(10);
    }

    public function create($data)
    {
        try {
            if ($archivo = $data->foto_ruta) {
                $nombre = time() . '.' . $archivo->getClientOriginalExtension();
                $archivo->move('uploads/productos', $nombre);
                $data->foto_ruta = $nombre;
            }
            $producto = new Producto;
            $producto->user_id = Auth::user()->id;
            $producto->categoria_id = $data->categoria_id;
            $producto->nombre = $data->nombre;
            $producto->descripcion = $data->descripcion;
            $producto->foto_ruta = $data->foto_ruta;
            return $producto->save();
        } catch (Throwable $e) {
            dd($e);
            return null;
        }
    }

    public function show($id)
    {
        return Producto::find($id);
    }

    public function update($id, $data)
    {
        try {
            $producto = Producto::find($id);
            if ($archivo = $data->file('foto_ruta')) {
                if (!is_null($producto->foto_ruta)) {
                    $rutaImagen = public_path() . '/uploads/productos/' . $producto->foto_ruta;
                    if (@getimagesize($rutaImagen)) {
                        unlink($rutaImagen);
                    }
                }
                $nombre = time() . '.' . $archivo->getClientOriginalExtension();
                $archivo->move('uploads/productos', $nombre);
                $producto->foto_ruta = $nombre;
            }

            $producto->categoria_id = $data->categoria_id;
            $producto->nombre = $data->nombre;
            $producto->descripcion = $data->descripcion;
            return $producto->save();
        } catch (Throwable $e) {
            return null;
        }
    }

    public function delete($id)
    {
        try{
            $producto = Producto::find($id);
            if (!is_null($producto->foto_ruta)) {
                $rutaImagen = public_path() . '/uploads/productos/' . $producto->foto_ruta;
                if (@getimagesize($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }
            return $producto->delete();

        }catch (Throwable $e){
            return false;
        }
    }

    public function buscar($data)
    {
        return Producto::where('nombre', 'like','%' .$data. '%')->paginate(10);
    }

    public function getProductosXcategoria($idCategoria)
    {
        return Producto::where('categoria_id', $idCategoria)->get();
    }

    public function buscarProductosXCategoria($query,$id)
    {
        return Producto::where('nombre', 'like','%' .$query. '%')->where('categoria_id',$id)->get();
    }
}
