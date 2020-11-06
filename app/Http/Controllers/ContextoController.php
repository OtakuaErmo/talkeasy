<?php

namespace App\Http\Controllers;

use App\ContextoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContextoController extends Controller
{

    public function index()
    {
        $ObjContextos = ContextoModel::orderBy('id')->get();
        return view('pInicio')->with('contexto', $ObjContextos);
    }

    public function create()
    {
        if (Auth::id() === 1) {
            return view("controlPanel.adicionarContexto");
        }
    }

    public function store(Request $request)
    {
        if (Auth::id() === 1) {
            $request->validate([
                'contexto' => 'required',
                'imagem' => 'required|max:255',
            ]);
            $objContexto = new ContextoModel();
            $objContexto->contexto = $request->contexto;
            $objContexto->imagem = $request->imagem;
            $objContexto->save();
            return redirect()->back()->withInput()->withErrors(['Contexto '.mb_strtoupper($request->contexto, "utf-8").' inserido com sucesso!']);
        }

    }

    public function remove($id)
    {
        if (Auth::id() === 1) {
            $objContexto = ContextoModel::findOrFail($id);
            $data = $objContexto->contexto;
            $objContexto->delete();

            return redirect()->route('cpanel.contexto.list')->withInput()->withErrors(['Contexto '.mb_strtoupper($data,"utf-8").' removido com sucesso!']);
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
        }

    }


    public function showAll()
    {
        if (Auth::id() === 1) {
            $objContexto = ContextoModel::orderBy('id', 'DESC')->paginate(15);
            return view('controlPanel.removerContexto')->with('contextos', $objContexto);
        }

    }

    public function search(Request $request)
    {
        $query = DB::table('contextos');

        if (!empty($request->contexto)) {
            $query->where('contexto', 'like',  '%' . $request->contexto . '%');
        }

        $objContexto = $query->orderBy('id', 'DESC')->paginate(15);
        //dd($objContexto);
        return view('buscas.listRemoverPalavras')->with('palavras', $objContexto);
    }
}
