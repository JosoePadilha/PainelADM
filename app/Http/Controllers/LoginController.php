<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $remember = empty($data['remember']) ? false : true;

        if (Auth::attempt($credentials, $remember)) {

            $firstNameUser = Auth::user()->name;
            $firstNameUser = explode(" ", $firstNameUser);

            Session::put('firstNameUser', $firstNameUser[0]);

            $request->session()->regenerate();

            $st = "success";
            $message = "Seja bem vindo " . session()->get('firstNameUser');
            return redirect()->intended('dashboard')->with($st, $message);
        } else {
            $st = "error";
            $message = "Verifique os dados informados!!";
            return redirect()->back()->with($st, $message);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flush();

        return redirect('/');
    }

    public function forgetPassword()
    {
        return view('forgetPassword');
    }
}
