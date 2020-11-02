<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\LoginRequest as  Login;
use App\Http\Requests\RegisterRequest as Register;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function login(Request $request)
    {
        return view('admin.login');
    }

    public function postLogin(Login $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->put('username', Auth::user()->name);
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('mess', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    /**
     * --Register------
     *
     * 
     */
    public function register()
    {
        return view('admin.register');
    }

    /**
     * Post Register-----
     *
     */
    public function create(Register $request)
    {
        $user           = new Admin;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.login')->with('mess', 'Đăng kí thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
