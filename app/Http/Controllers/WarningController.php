<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarning;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarningController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('adm.warnings.createWarning');
    }

    public function store(StoreWarning $request)
    {
        $data = $this->request->only('title', 'content', 'class');
        $data['user_id'] = Auth::user()->id;

        if (Warning::create($data)) {
            $st = "success";
            $message = "Cadastro efetuado com sucesso!!";
        } else {
            $st = "danger";
            $message = "Não foi possível cadastrar!!";
        }

        return redirect()->back()->with($st, $message);
    }

    public function show(){
        return view('adm.warnings.show', [
            'warnings' => DB::table('warnings')->paginate(9)
        ]);
    }

    public function destroy($id){
        $warning = Warning::find($id);
        if ($warning == null) {
            $st = "error";
            $message = "Não foi possível excluir o aviso!!";
        } else {
            $warning->delete();
            $st = "success";
            $message = "Aviso excluído com sucesso!!";
        }
        return redirect()->back()->with($st, $message);
    }
}
