<?php


namespace App\Repositories;


use App\IRepositories\IUserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Throwable;
class UserRepository implements IUserRepository
{

    public function all()
    {
        return User::paginate(10);
    }

    public function create($data)
    {
        try {
            $data['password'] = $this->hashPassword($data['password']);
            return User::create($data);
        }catch (Throwable $e){
            return null;
        }
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update($id, $data)
    {
       try{
           $user = User::find($id);
           $user->name = $data->name;
           $user->lastname_1 = $data->lastname_1;
           $user->lastname_2 = $data->lastname_2;
           $user->email = $data->email;
           $user->tipo_usuario_id = $data->tipo_usuario_id;
           return $user->save();
       }catch (Throwable $e){
           return $e;
       }
    }

    public function delete($id)
    {
        try {
            return  User::find($id)->delete();
        }catch (Throwable $e){
            return false;
        }
    }
    public function hashPassword($password): string
    {
        return Hash::make($password);
    }
}
