<?php

namespace App\Repositories;

use App\Http\Controllers\RepositoryController;
use App\Models\Repositery;
use App\Repositories\IUserRepository;

class UserRepository implements IUserRepository
{

    public function getAllUsers()
    {
        return Repositery::all();
    }
    public function userInsert($request)
    {
            return Repositery::create($request->all());
    }
    public function userEdit($id)
    {
        return Repositery::find($id);
    }
    public function userUpdate($request,$id)
    {
       $user=Repositery::find($id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->city=$request->city;
       $user->phone=$request->phone;
       return $user->save();
    }
    public function userDelete($id)
    {
        return Repositery::destroy($id);
    }
}
?>
