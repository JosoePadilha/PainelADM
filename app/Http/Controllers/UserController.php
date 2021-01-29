<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::user()->type == "Adm" || Auth::user()->type == "Usuario") {
            return view('users.dashboard');
        } else if (Auth::user()->type == "Cliente") {
            return view('clients.dashboard');
        } else {
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
    public function store(StoreUpdateUser $request)
    {
        $data = $this->request->only('name', 'email', 'phone', 'password', 'type', 'avatar');

        $data['password'] = bcrypt($data['password']);

        $user = $this->checkUserExistence($data);

        if ($user == null) {
            $data['avatar'] = $this->resizeAvatar($this->request);
            $data['status'] = 'Ativo';
            User::create($data);
            $st = "success";
            $message = "Cadastro efetuado com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível cadastrar, e-mail já cadastrados!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCollaborator()
    {
        //$users = $user::orderBy('name', 'asc')->paginate(4);
        return view('adm.showCollaborators', [
            'users' => DB::table('users')->paginate(8)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('adm.formEditCollaborator', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if ($user = User::find($id)) {

            $data = $this->request->only('name', 'email', 'phone','type', 'avatar');
            $data['password'] = $user->password;

            $checkUser = $this->checkUserExistence($data);

            if ($checkUser == null) {
                if (isset($this->request->avatar)) {
                    if ($user->avatar != null) {
                        Storage::delete($user->avatar);
                    }
                    $data['avatar'] = $this->resizeAvatar($this->request);
                } else if (($this->request->avatar == null && $user->avatar != null)) {
                    $data['avatar'] = $user->avatar;
                } else {
                    $data['avatar'] = "";
                }

                $user->update($data);
                $st = "success";
                $message = "Dados alterados com sucesso!!";
            }
            else{
                $st = "error";
                $message = "E-mail já cadastrado!!";
            }
        } else {
            $st = "error";
            $message = "Não foi possível alterar!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user == null) {
            $st = "error";
            $message = "Não foi possível excluir o usuário!!";
        } else {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->delete();
            $st = "success";
            $message = "Usuário excluído com sucesso!!";
        }
        return redirect()->back()->with($st, $message);
    }

    public function searchCollaborator(Request $request)
    {

        if (isset($request->filter)) {
            $filters = $request->except('_token');
            $data = $request['filter'];
            $users = $this->searchUser($data);
            if (!$users) {
                $st = "error";
                $message = "Não há registros!!";
                return redirect()->route('showCollaborator');
            } else {
                $st = "success";
                $message = "Dados encontrados!!";

                return view('adm.showCollaborators', [
                    'users' => $users,
                    'filters' => $filters,
                    'st' => $st,
                    'message' => $message,
                ]);
            }
        } else {
            return redirect()->route('showCollaborator');
        }
    }

    protected function checkUserExistence($data)
    {
        $check = DB::table('users')
            ->orWhere('email', '=', $data['email'])->first();

        return $check;
    }

    public function resizeAvatar(Request $request)
    {
        if ($this->request->hasFile('avatar') && $this->request->avatar->isValid()) {
            $nameAvatar = md5(uniqid()) . '-' . time() . '.jpg';
            $destinationPath = storage_path('app/public/clients');
            $img = Image::make($this->request->avatar->getRealPath());

            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nameAvatar);

            $destinationPath = storage_path('app/public/clients');

            $dirAvatar = 'clients/' . $nameAvatar;
        } else {
            $dirAvatar = '';
        }
        return $dirAvatar;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $this->request->session()->invalidate();

        $this->request->session()->regenerateToken();

        return redirect('/');
    }

    protected function searchUser($filter = null)
    {
        $result = User::orderBy('name', 'asc')->where(function ($query) use ($filter) {
            if ($filter) {
                $query->orWhere("name", "LIKE", "%$filter%")
                    ->orWhere("email", "LIKE", "%$filter%");
            }
        })->paginate();

        return $result;
    }
}
