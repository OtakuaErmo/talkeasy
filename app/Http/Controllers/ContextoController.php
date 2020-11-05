<?php

namespace App\Http\Controllers;

use App\ContextoModel;
use Illuminate\Http\Request;

class ContextoController extends Controller
{

    public function index()
    {
        $ObjContextos = ContextoModel::orderBy('id')->get();
        return view('pInicio')->with('contexto', $ObjContextos);
    }
}
