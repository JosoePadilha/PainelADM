<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request){
        $data = $request->only('email', 'password');
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        
        $remember = empty($data['remember']) ? false : true;
        
        if(Auth::attempt($credentials, $remember)){            
            $request->session()->regenerate();
            // $st = "success";
            // $message = "Seja bem vindo ". Auth::user()->name;      
            return redirect()->intended('dashboard');          
        }
        else{
            // $st = "error";
            // $message = "Verifique os dados informados!!";            
            return redirect('/');
        }
    }

    public function forgetPassword()
    {
        return view('forgetPassword');
    }
}
