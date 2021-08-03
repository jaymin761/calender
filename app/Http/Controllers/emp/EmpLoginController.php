<?php

namespace App\Http\Controllers\emp;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo='/emp/home';

    public function __construct()
    {
        $this->middleware('guest:emp')->except('logout');
    }
    public function showLoginForm()
    {
        return view('emp.login');
    }
    public function logout(Request $request)
    {
        $this->guard('emp')->logout();
        return redirect()->route('emp.login');
    }
    protected function guard()
    {
        return Auth::guard('emp');
    }
}
