<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {        
        if(Auth::user()->type == "adm" || Auth::user()->type == "collaborator"){
            return view('users.dashboard');
        }else if(Auth::user()->type == "client"){
            return view('client.dashboard');
        }
        else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.formStoreCollaborator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'email', 'phone', 'password', 'type', 'avatar');       
        
        $data['password'] = bcrypt($data['password']);

        $user = $this->checkUserExistence($data);
        
        if($user == null){            
            $data['avatar'] = $this->upLoadAvatar($request, $data);
            $data['status'] = 'active';
            User::create($data);
            // $st = "success";
            // $message = "Cadastro efetuado com sucesso!!";         
            return redirect()->back();  
        }
        else{
            // $st = "error";
            // $message = "Não foi possível cadastrar, e-mail ou CPF já cadastrados!!";            
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    protected function checkUserExistence($data)
    {
        $check = DB::table('users')
            ->orWhere('email', '=', $data['email'])->first();

        return $check;
    }

    protected function upLoadAvatar($request, $data)
    {
        if($request->hasFile('avatar') && $request->avatar->isValid()){
            $imageClient = $request->avatar->store('clients');
            $data['avatar'] = $imageClient;            
        }
        else{
            $data['avatar'] = '';
        }        
        return $data['avatar'];
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}