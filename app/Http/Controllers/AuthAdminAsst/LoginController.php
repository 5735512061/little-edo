<?php

namespace App\Http\Controllers\AuthAdminAsst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest:adminAsst')->except('logout');
    // }

    public function showLoginForm()
    {
        return view('authAdminAsst.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
          'adminAsst_name' => 'required',
          'password' => 'required|min:6'
        ],[
          'adminAsst_name.required' => "กรุณากรอกชื่อผู้ใช้",
          'password.required' => "กรุณากรอกรหัสผ่าน",
          'password.min' => "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร",
        ]);


        $credential = [
          'adminAsst_name' => $request->adminAsst_name,
          'password' =>$request->password
        ];

       if(Auth::guard('adminAsst')->attempt($credential, $request->member)){
         
         return redirect()->intended(route('adminAsst.home'));
       }
       
       return redirect()->back()->withInput($request->only('adminAsst_name','remember'));
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('adminAsst')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'adminAsst.login' ));
    }
}
