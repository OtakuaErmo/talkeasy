<?php

namespace App\Http\Controllers;

use App\PalavraModel;
use Illuminate\Http\Request;

class PalavraController extends Controller
{

    public function index($id)
    {
        $ObjPalavras = PalavraModel::where('id_contexto', '=', $id)->get();
        return view('pPalavras')->with('palavra', $ObjPalavras);
    }

}
