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

        return view('adm.documents.documentClient', [
            'client' => $client,
            'documents' => $documents,
        ]);
    }

    public function download($link)
    {
        return response()->download(storage_path("app/pdfs/" . $link));
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

    public function destroy($id)
    {
        $document = Document::find($id);

        if ($document == null) {
            $st = "error";
            $message = "Não foi possível excluir o documento!!";
        } else {
            unlink(storage_path('app/pdfs/' . $document->document));
            $document->delete();
            $st = "success";
            $message = "Documento excluído com sucesso!!";
        }

        return redirect()->back()->with($st, $message);
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

    public function showDocumentsVanquished($filter = null)
    {
        $datas = DB::table('clients')
            ->join('documents', 'clients.id', '=', 'documents.client_id')
            ->where('dueDate', '<', date("Y-m-d h:i:s"))
            ->where('clients.status', '=', 'Ativo')
            ->orderBy('clients.name', 'asc')->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('client.name', 'LIKE', "%$filter%");
                }
            })->paginate();

        return view('adm.documents.showListDocuments', [
            'datas' => $datas,
        ]);
    }

    public function searchClientsActiveDocument(Request $request)
    {
        if (isset($request->filter)) {
            $filters = $request->except('_token');
            $data = $request['filter'];
            $datas = $this->searchActiveClient($data);
            if (!$datas) {
                $st = "error";
                $message = "Não há registros!!";
                return redirect()->route('showDocumentsVanquished');
            } else {
                $st = "success";
                $message = "Dados encontrados!!";

                return view('adm.documents.showListDocuments', [
                    'datas' => $datas,
                    'filters' => $filters,
                    'st' => $st,
                    'message' => $message,
                ]);
            }
        } else {
            return redirect()->route('showDocumentsVanquished');
        }
    }

    protected function searchActiveClient($filter = null)
    {
        $datas = DB::table('clients')
            ->join('documents', 'clients.id', '=', 'documents.client_id')
            ->where('dueDate', '<', date("Y-m-d h:i:s"))
            ->where('clients.status', '=', 'Ativo')
            ->orderBy('clients.name', 'asc')->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('clients.name', 'LIKE', "%$filter%")
                        ->where('status', '=', 'Ativo');
                }
            })->paginate();

        return $datas;
    }
}
