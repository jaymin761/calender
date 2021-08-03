<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo='/admin/home';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
