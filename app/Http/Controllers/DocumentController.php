<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDocument;
use Illuminate\Http\Request;
use App\Models\CLient;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index($id)
    {
        $client = Client::find($id);
        return view('adm.documentClient', [
            'client' => $client,
        ]);
    }

    public function store(StoreUpdateDocument $request, $idClient)
    {
        $data = $this->request->only('title', 'dueDate', 'document');
        $data['idClient'] = intval($idClient);
        $data['idUser'] = Auth::user()->id;
        $data['dueDate'] = $this->convertDate($data);

        $data['document'] = $this->upLoadPdf($this->request);
        dd($data);
        if (Document::create($data)) {
            $st = "success";
            $message = "Documento anexado com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível anexar o arquivo!!";
        }

        return redirect()->back()->with($st, $message);
    }


    protected function convertDate($data)
    {
        $dado = str_replace("/", "-", $data['dueDate']);
        $data['dueDate'] = date('Y-m-d', strtotime($dado));
        return  $data['dueDate'];
    }

    public function upLoadPdf(Request $request)
    {
        if ($this->request->hasFile('document') && $this->request->file('document')->isValid()) {

            $file              = $this->request->file('document');
            $original_filename = $this->request->title;
            $name = str_replace(' ', '', $original_filename);
            $stored_filename   = $name . md5(uniqid()) . '.pdf';
            $file_path         = storage_path('app/pdfs/');
            $file->move($file_path, $stored_filename);
        }

        return $stored_filename;
    }
}
