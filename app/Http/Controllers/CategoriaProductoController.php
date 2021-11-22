<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoria;
use App\IRepositories\ICategoriaRepository;
use Throwable;

class CategoriaProductoController extends Controller
{
    private $ICategoriaRepository;

    public function __construct(ICategoriaRepository $ICategoriaRepository)
    {
        $this->middleware('auth');
        $this->ICategoriaRepository = $ICategoriaRepository;
    }
    public function index(){
        $categorias = $this->ICategoriaRepository->all();
        return view('categoria-producto.categorias',compact('categorias'));
    }

    public function store(StoreCategoria $request){
        if($request->ajax()){
            try{
            $categoria = $this->ICategoriaRepository->create($request);
            if(!is_null($categoria)){
                return response()->json('ok',200);
            }else{
                return response()->json('No se ha guardo',400);
            }
            }catch (Throwable $e){
                return response()->json('Error',500);
            }
        }
    }

    public function destroy($id){
        try {
            $categoria = $this->ICategoriaRepository->delete((int)$id);
            if ($categoria) {
                return response()->json('ok', 200);
            } else {
                return response()->json('Error', 400);
            }
        } catch (Throwable $e) {
            return response()->json('Error de servidor', 500);
        }
    }

    public function update(StoreCategoria $request, $id){
        if($request->ajax()){
            try{
                $categoria = $this->ICategoriaRepository->update($id,$request);
                if(!is_null($categoria)){
                    return response()->json('ok',200);
                }else{
                    return response()->json('No se ha guardo',400);
                }
            }catch (Throwable $e){
                return response()->json('Error',500);
            }
        }
    }
}
