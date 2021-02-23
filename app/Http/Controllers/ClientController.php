<?php

namespace App\Http\Controllers;

use App\Models\CLient;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateClient;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.clients.formStoreClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateClient $request)
    {
        $data = $this->request->only(
            'name',
            'status',
            'avatar',
            'socialReason',
            'cnpj',
            'phone',
            'celPhone',
            'email',
            'city',
            'neighborhood',
            'state',
            'number',
            'password'
        );

        $client = $this->checkClientExistence($data);

        if ($client == null) {
            $data['password'] = bcrypt($data['password']);
            $data['type'] = 'Cliente';
            $data['avatar'] = $this->resizeAvatar($this->request);
            $data['status'] = 'Ativo';

            $user = null;
            $user = User::where('email', $this->request->email)->first();

            if ($user) {
                $st = "error";
                $message = "E-mail já cadastrado para algum usuário!!";
            } else {
                CLient::create($data);
                $st = "success";
                $message = "Cadastro efetuado com sucesso!!";
            }
        } else {
            $st = "error";
            $message = "Não foi possível cadastrar, e-mail já cadastrados!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function showClients()
    {
        //$users = $user::orderBy('name', 'asc')->paginate(4);
        return view('adm.clients.showClients', [
            'clients' => DB::table('clients')->orderby('name')->paginate(9)
        ]);
    }


    public function viewClientDocument()
    {
        //$users = $user::orderBy('name', 'asc')->paginate(4);
        return view('adm.documents.showClientDocument', [
            'clients' => DB::table('clients')
                ->orWhere('status', '=', 'Ativo')
                ->orderBy('name', 'asc')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('adm.clients.formEditClient', [
            'client' => $client,
        ]);
    }

    public function seeClient($id)
    {
        $client = Client::find($id);
        return view('adm.clients.seeClient', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateClient $request, $id)
    {
        if ($client = Client::find($id)) {

            $data = $this->request->only(
                'name',
                'type',
                'status',
                'avatar',
                'socialReason',
                'cnpj',
                'phone',
                'celPhone',
                'email',
                'city',
                'neighborhood',
                'state',
                'number',
                'password'
            );

            $data['password'] = $client->password;

            if (isset($this->request->avatar)) {
                if ($client->avatar != null) {
                    Storage::delete($client->avatar);
                }
                $data['avatar'] = $this->resizeAvatar($this->request);
            } else if (($this->request->avatar == null && $client->avatar != null)) {
                $data['avatar'] = $client->avatar;
            } else {
                $data['avatar'] = "";
            }

            $user = null;
            $user = User::where('email', $this->request->email)->first();

            if ($user) {
                $st = "error";
                $message = "E-mail já cadastrado para algum usuário!!";
            } else {
                $client->update($data);
                $st = "success";
                $message = "Dados alterados com sucesso!!";
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
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client == null) {
            $st = "error";
            $message = "Não foi possível excluir o cliente!!";
        } else {
            if ($client->avatar) {
                Storage::delete($client->avatar);
            }
            $client->delete();
            $st = "success";
            $message = "Cliente excluído com sucesso!!";
        }
        return redirect()->back()->with($st, $message);
    }

    public function searchClient(Request $request)
    {
        if (isset($request->filter)) {
            $filters = $request->except('_token');
            $data = $request['filter'];
            $clients = $this->searchClients($data);
            if (!$clients) {
                $st = "error";
                $message = "Não há registros!!";
                return redirect()->route('showClients');
            } else {
                $st = "success";
                $message = "Dados encontrados!!";

                return view('adm.clients.showClients', [
                    'clients' => $clients,
                    'filters' => $filters,
                    'st' => $st,
                    'message' => $message,
                ]);
            }
        } else {
            return redirect()->route('showClients');
        }
    }

    public function clientActive(Request $request)
    {
        if (isset($request->filter)) {
            $filters = $request->except('_token');
            $data = $request['filter'];
            $clients = $this->searchActiveClient($data);
            if (!$clients) {
                $st = "error";
                $message = "Não há registros!!";
                return redirect()->route('searchClientsActive');
            } else {
                $st = "success";
                $message = "Dados encontrados!!";

                return view('adm.documents.showClientDocument', [
                    'clients' => $clients,
                    'filters' => $filters,
                    'st' => $st,
                    'message' => $message,
                ]);
            }
        } else {
            return redirect()->route('showClientDocument');
        }
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

    protected function searchClients($filter = null)
    {
        $result = Client::orderBy('name', 'asc')->where(function ($query) use ($filter) {
            if ($filter) {
                $query->orWhere("name", "LIKE", "%$filter%")
                    ->orWhere("email", "LIKE", "%$filter%");
            }
        })->paginate();

        return $result;
    }

    protected function searchActiveClient($filter = null)
    {
        $result = Client::orderBy('name', 'asc')->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%$filter%")
                    ->where('status', '=', 'Ativo');
            }
        })->paginate();

        return $result;
    }

    protected function checkClientExistence($data)
    {
        $check = DB::table('clients')
            ->orWhere('email', '=', $data['email'])
            ->orWhere('cnpj', '=', $data['cnpj'])->first();

        return $check;
    }
}
