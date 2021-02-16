<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\sendMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    protected $request;
    protected $flag1;
    protected $flag2;
    protected $link;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->flag1 = false;
        $this->flag2 = false;
    }

    public function forgetPassword()
    {
        return view('forgetPassword');
    }

    public function reset(ResetPasswordRequest $request)
    {
        $data = $this->request;
        dd($data);
        dd('aqui');
    }

    public function resetPassword($token, $email)
    {
        $user = DB::table('users')->where('email', $email)->first();

        if ($user == null) {
            $st = "error";
            $message = "E-mail não cadastrado!!";
            return redirect()->back()->with($st, $message);
        }

        $user = User::find($user->id);

        $tokenRemember = DB::table('password_resets')->where('token', $token)->first();

        if ($tokenRemember) {
            if ($token == $tokenRemember->token) {
                return view('formResetPassword')->with([
                    'user' => $user,
                    'token' => $token,
                ]);
            } else {
                $st = "error";
                $message = "E-mail não cadastrado!!";
                return redirect()->back()->with($st, $message);
            }
        }
    }


    public function sendMailReset(Request $request)
    {
        $this->validate($this->request,[
            'email' =>'required|email:rfc,filter|min:10|max:255'
        ]);
        $data = $this->request->only('email');
        $user = DB::table('users')->where('email', '=', $data['email'])->first();
        $client = DB::table('clients')->where('email', '=', $data['email'])->first();

        if ($user <> null) {
            $this->flag1 = true;
        } else if ($client <> null) {
            $this->flag2 = true;
        } else {
            $this->flag2 = false;
            $this->flag1 = false;
        }

        if ($this->flag1 == true || $this->flag2 == true) {
            DB::table('password_resets')->insert([
                'email' => $data['email'],
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')->where('email', $data['email'])->first();

            $this->link = $this->generateToken($data['email'], $tokenData->token, $this->flag1, $this->flag2);

            if ($this->link) {

                $message = 'Solicitação de alteração de senha.';

                if ($this->flag1 == true) {
                    Mail::to($user->email)->send(new sendMail($user, $this->link, $message));
                } else if ($this->flag2 == true) {
                    Mail::to($client->email)->send(new sendMail($client, $this->link, $message));
                }

                $st = "success";
                $message = "Link enviado para seu e-mail!!";
            } else {
                $st = "error";
                $message = "Não foi possível enviar o e-mail!!";
            }
        } else {
            $st = "error";
            $message = "E-mail não cadastrado!!";
        }

        return redirect()->back()->with($st, $message);
    }

    private function generateToken($email, $token, $flag1, $flag2)
    {
        if ($flag1 == true) {
            $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
            $this->link = url('') . '/resetPassword' . '/' . $token . '/' . urlencode($user->email);
        } else if ($flag2 == true) {
            $client = DB::table('clients')->where('email', $email)->select('name', 'email')->first();
            $this->link = url('') . '/resetPassword' . '/' . $token . '/' . urlencode($client->email);
        }

        return $this->link;
    }
}
