<?php

namespace App\Http\Controllers;

use App\SugestaoModel;
use Illuminate\Http\Request;

class SugestaoController extends Controller
{
    public function index()
    {
        $ObjSugestao = SugestaoModel::orderBy('id')->get();
        return view('sugestoes')->with('sugestao', $ObjSugestao);
    }

    public function store(Request $request)
    {
        $request->validate([
            'responsavel' => 'required|max:50',
            'sugestao' => 'required|max:255',
        ]);
        $ObjSugestao = new SugestaoModel();
        $ObjSugestao->responsavel = $request->responsavel;
        $ObjSugestao->sugestao = $request->sugestao;
        $ObjSugestao->save();
        return redirect()->back()->withInput()->withErrors(['Sugestão inserida com sucesso!']);
        //return \redirect()->action('SuegstaoController@index')->with('sucess', "Aluno salvo com sucesso!");
    }
}
