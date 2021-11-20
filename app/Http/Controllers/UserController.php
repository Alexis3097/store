<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\IRepositories\ITipoUsuarioRepository;
use App\IRepositories\IUserRepository;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    private $IUserRepository;
    private $ITipoUsuarioRepository;

    public function __construct(IUserRepository $IUserRepository, ITipoUsuarioRepository $ITipoUsuarioRepository)
    {
        $this->middleware('auth');
        $this->IUserRepository = $IUserRepository;
        $this->ITipoUsuarioRepository = $ITipoUsuarioRepository;
    }

    public function index()
    {
        $usuarios = $this->IUserRepository->all();
        return view('usuarios.usuarios', compact('usuarios'));
    }


    public function create()
    {
        $tipoUsuarios = $this->ITipoUsuarioRepository->all();
        return view('usuarios.crear', compact('tipoUsuarios'));
    }


    public function store(StoreUser $request)
    {
        try {
            $user = $this->IUserRepository->create($request->all());
            if(!is_null($user)){
                $request->session()->flash('alert-success', 'Se ha guardado el usuario');
            }else{
                $request->session()->flash('alert-danger', 'no se ha guardado el usuario');
            }
            return redirect()->route('usuarios.index');
        } catch (Throwable $e) {
            $request->session()->flash('alert-danger',  'Error de servidor');
            return redirect()->route('usuarios.index');
        }

    }


    public function show($id)
    {

        dd('show' . $id);
    }


    public function edit($id)
    {
        $usuario = $this->IUserRepository->show($id);
        $tipoUsuarios = $this->ITipoUsuarioRepository->all();
        return view('usuarios.editar', compact('usuario','tipoUsuarios'));
    }


    public function update(UpdateUser $request, $id)
    {
       try{
           $usuario = $this->IUserRepository->update($id, $request);
           if(!is_null($usuario)){
               $request->session()->flash('alert-success', 'Se ha actualizado el usuario');
           }else{
               $request->session()->flash('alert-danger', 'no se ha actualizado el usuario');
           }
           return redirect()->route('usuarios.index');
       }catch (Throwable $e){
           $request->session()->flash('alert-danger',  'Error de servidor');
           return redirect()->route('usuarios.index');
       }
    }

    public function destroy($id)
    {
        //
    }
}
