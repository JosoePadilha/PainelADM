<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFamily;
use App\Models\FamilyProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FamilyProductController extends Controller
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
        return view('adm.products.formStoreFamilyProduct');
    }


    public function store(StoreUpdateFamily $request)
    {
        $data = $this->request->only('name');

        $family = $this->checkFamilyExistence($data);

        if ($family == null) {
            FamilyProducts::create($data);
            $st = "success";
            $message = "Cadastro efetuado com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível cadastrar, nome já cadastrado!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyProducts  $familyProducts
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyProducts $familyProducts)
    {
        return view('adm.products.showFamilys', [
            'familys' => DB::table('familys')->orderby('name')->paginate(9)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyProducts  $familyProducts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = FamilyProducts::find($id);
        return view('adm.products.formEditFamily', [
            'family' => $family,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyProducts  $familyProducts
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFamily $request, $id)
    {
        if ($family = FamilyProducts::find($id)) {

            $data = $this->request->only('name');

            $family->update($data);
            $st = "success";
            $message = "Dados alterados com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível alterar!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyProducts  $familyProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = FamilyProducts::find($id);
        if ($family == null) {
            $st = "error";
            $message = "Não foi possível excluir o registro!!";
        } else {
            $family->delete();
            $st = "success";
            $message = "Registro excluída com sucesso!!";
        }

        return redirect()->back()->with($st, $message);
    }

    protected function checkFamilyExistence($data)
    {
        $check = DB::table('familys')
            ->orWhere('name', '=', $data['name'])->first();

        return $check;
    }
}
