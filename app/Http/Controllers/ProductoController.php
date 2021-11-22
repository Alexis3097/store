<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducto;
use App\Http\Requests\UpdateProducto;
use App\IRepositories\ICategoriaRepository;
use App\IRepositories\IProductoRepository;
use Illuminate\Http\Request;
use Throwable;

class ProductoController extends Controller
{
    private $IProductoRepository;
    private $ICategoriaRepository;

    public function __construct(IProductoRepository $IProductoRepository, ICategoriaRepository $ICategoriaRepository)
    {
        $this->middleware('auth');
        $this->IProductoRepository = $IProductoRepository;
        $this->ICategoriaRepository = $ICategoriaRepository;
    }

    public function index()
    {
        $productos = $this->IProductoRepository->all();
        return view('producto.productos', compact('productos'));
    }


    public function create()
    {
        $categorias = $this->ICategoriaRepository->allActive();
        return view('producto.crear', compact('categorias'));
    }


    public function store(StoreProducto $request)
    {
        try {
            $producto = $this->IProductoRepository->create($request);
            return redirect()->route('producto.index');
        } catch (Throwable $e) {
            return redirect()->route('producto.index');
        }
    }


    public function edit($id)
    {
        $categorias = $this->ICategoriaRepository->allActive();
        $producto = $this->IProductoRepository->show($id);
        return view('producto.editar',compact('categorias','producto'));
    }


    public function update(UpdateProducto $request, $id)
    {
        try {
            $producto = $this->IProductoRepository->update($id, $request);
            if (!is_null($producto)) {
                $request->session()->flash('alert-success', 'Se ha actualizado el producto');
            } else {
                $request->session()->flash('alert-danger', 'no se ha actualizado el producto');
            }
            return redirect()->route('producto.index');
        } catch (Throwable $e) {
            $request->session()->flash('alert-danger', 'Error de servidor');
            return redirect()->route('usuarios.index');
        }
    }


    public function destroy($id)
    {
        try {
            $producto = $this->IProductoRepository->delete((int)$id);
            if ($producto) {
                return response()->json('ok', 200);
            } else {
                return response()->json('Error', 400);
            }
        } catch (Throwable $e) {
            return response()->json('Error de servidor', 500);
        }
    }
}
