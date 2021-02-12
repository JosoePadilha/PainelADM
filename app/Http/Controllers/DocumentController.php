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
        $documents = $this->searchDocumentsCLient($client['id']);

        // foreach ($documents as $document)
        // {
        //     $document->dueDate = $this->convertDateBr($document->dueDate);
        // }

        return view('adm.documentClient', [
            'client' => $client,
            'documents' => $documents,
        ]);
    }

    public function store(StoreUpdateDocument $request, $idClient)
    {
        $data = $this->request->only('title', 'dueDate', 'document');
        $data['client_id'] = intval($idClient);
        $data['user_id'] = Auth::user()->id;
        $data['dueDate'] = $this->convertDate($data['dueDate']);
        $data['document'] = $this->upLoadPdf($this->request);

        if (Document::create($data)) {
            $st = "success";
            $message = "Documento anexado com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível anexar o arquivo!!";
        }

        $documents = $this->searchDocumentsCLient($data['client_id']);

        return redirect()->back()->with($st, $message, compact($documents));
    }


    protected function convertDate($data)
    {
        $dado = str_replace("/", "-", $data);
        $data = date('Y-m-d', strtotime($dado));
        return  $data;
    }

    protected function convertDateBr($data)
    {
        $dado = str_replace("-", "/", $data);
        $data = date('d-m-Y', strtotime($dado));
        return $data;
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

    protected function searchDocumentsCLient($filter = null)
    {
        $result = Document::orderBy('created_at', 'desc')->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('client_id', '=', $filter);
            }
        })->paginate(4);

        return $result;
    }
}
