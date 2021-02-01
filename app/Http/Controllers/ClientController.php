<?php

namespace App\Http\Controllers;

use App\Models\CLient;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateClient;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        return view('adm.formStoreClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateClient $request)
    {
        $data = $this->request->only
        ('name', 'status', 'avatar', 'socialReason', 'cnpj', 'phone', 'celPhone', 'email', 'city',
        'neighborhood', 'state', 'number', 'password');

        $data['password'] = bcrypt($data['password']);

        $client = $this->checkClientExistence($data);

        if ($client == null) {
            $data['avatar'] = $this->resizeAvatar($this->request);
            $data['status'] = 'Ativo';
            CLient::create($data);
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
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function show(CLient $cLient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function edit(CLient $cLient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CLient $cLient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function destroy(CLient $cLient)
    {
        //
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

    protected function checkClientExistence($data)
    {
        $check = DB::table('clients')
            ->orWhere('email', '=', $data['email'])
            ->orWhere('cnpj', '=', $data['cnpj'])->first();

        return $check;
    }
}
