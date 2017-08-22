<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.users.login');
    }

    public function login(LoginRequest $request)
    {

    	$login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->action('Admin\DashboardController@index');
        } else {
        	//return "login khong thanh cong";
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function logout()
    {
    	Auth::logout();
        return redirect()->action('Admin\LoginController@index');
    }
}
