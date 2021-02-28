<?php

namespace App\Http\Controllers;

use App\Models\CLient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $data = $request->only('email', 'password', 'remember');
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

            if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                if (Auth::guard('client')->check()) {

                    $firstNameUser = Auth::guard('client')->user()->name;
                    $firstNameUser = explode(" ", $firstNameUser);

                    Session::put('firstNameUser', $firstNameUser[0]);

                    $request->session()->regenerate();
                    $st = "success";
                    $message = "Seja bem vindo";
                    return redirect()->route('dashboardClient')->with($st, $message);
                }
            } else {
                $st = "error";
                $message = "Verifique os dados informados!!";
            }
            return redirect()->back()->with($st, $message);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Session::flush();
        } else if (Auth::guard('client')->check()) {

            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Session::flush();
        }

        return redirect('/');
    }
}
