<?php

namespace App\Http\Controllers;

use App\SugestaoModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SugestaoController extends Controller
{
    public function index()
    {
        $ObjSugestao = SugestaoModel::orderBy('id', 'DESC')->paginate(10);
        return view('pSugestoes')->with('sugestao', $ObjSugestao);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required',
            'sugestao' => 'required|max:255',
        ]);
        $ObjSugestao = new SugestaoModel();
        $ObjSugestao->usuario_id = $request->usuario_id;
        $ObjSugestao->sugestao = $request->sugestao;
        $ObjSugestao->save();
        return redirect()->back()->withInput()->withErrors(['Sugestão inserida com sucesso!']);
    }

    public function remove($id)
    {
        if (Auth::id() === 1) {
            $objSugestao = SugestaoModel::findOrFail($id);
            $data = $objSugestao->sugestao;
            $objSugestao->delete();

            return redirect()->back()->withInput()->withErrors(['Sugestão '.$data.' removida com sucesso!']);
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
        }

    }
}
