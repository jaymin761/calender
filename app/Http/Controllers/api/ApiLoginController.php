<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends BaseController
{

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' =>request('password')]))
        {

            $user = Auth::user();
            $success['token'] =  $user->createToken('AppName')->accessToken;
            return $this->sendResponse($success,'succesfuly login');
        }
    }
    public function register(Request $request)
    {
        User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
        ]);
        return response()->json('Register succefully');

    }
    public function index()
    {
        $success['view']=Admin::all();
        return $this->sendResponse($success,'succesfuly login');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->user()->token()->revoke();
        return 'logout  succefully';
    }
    function insert(Request $request)
    {
        $insert=$request->all();
        Admin::create($insert);
        return 'insert  succefully';
    }
}
