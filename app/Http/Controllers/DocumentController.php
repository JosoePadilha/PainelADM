<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CLient;

class DocumentController extends Controller
{
    public function index($id){
        $client = Client::find($id);
        return view('adm.documentClient', [
            'client' => $client,
        ]);
    }
}
