<?php

namespace App\Http\Controllers;

use App\ContextoModel;
use App\PalavraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PalavraController extends Controller
{

    public function index($id)
    {
        $ObjPalavras = PalavraModel::where('id_contexto', '=', $id)->get();
        return view('pPalavras')->with('palavra', $ObjPalavras);
    }

    public function create()
    {
        $objContextos = ContextoModel::orderBy('id')->get();
        return view("controlPanel.palavra.adicionar")->with('contextos', $objContextos);
    }

    public function store(Request $request)
    {

        if (Auth::id() === 1) {
            $request->validate([
                'id_contexto' => 'required',
                'imagem' => 'required|max:255',
            ]);
            $ObjPalavra = new PalavraModel();
            $ObjPalavra->id_contexto = $request->id_contexto;
            $ObjPalavra->palavra = ucwords($request->palavra);;
            $ObjPalavra->imagem = $request->imagem;
            $ObjPalavra->video_src = $request->vide_src;
            $ObjPalavra->save();
            return redirect()->back()->withInput()->withErrors(['Palavra '.mb_strtoupper($request->palavra, "utf-8").' inserida com sucesso!']);
        }

    }

    public function edit($id)
    {
        $objPalavra = PalavraModel::findorfail($id);

        return view('cpanel.palavra.edit')->with('contexto', $objPalavra);
    }

    public function remove($id)
    {
        if (Auth::id() === 1) {
            $ObjPalavra = PalavraModel::findOrFail($id);
            $data = $ObjPalavra->palavra;
            $ObjPalavra->delete();

            return redirect()->route('cpanel.palavra.list')->withInput()->withErrors(['Palavra '.mb_strtoupper($data,"utf-8").' removida com sucesso!']);
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
        }

    }

    public function showAll()
    {
        if (Auth::id() === 1) {
            $ObjPalavras = PalavraModel::orderBy('id_contexto', 'DESC')->paginate(15);
            return view('controlPanel.palavra.list')->with('palavras', $ObjPalavras);
        }

    }


    public function search(Request $request)
    {
        $query = DB::table('palavras');

        if (!empty($request->palavra)) {
            $query->where('palavra', 'like',  '%' . $request->palavra . '%');
        }
        if (!empty($request->id_contexto)) {
            $query->where('id_contexto', 'like',  '%' . $request->id_contexto . '%');
        }

        $objPalavra = $query->orderBy('id', 'DESC')->paginate(15);
        //dd($objPalavra);
        return view('buscas.listRemover.palavras')->with('palavras', $objPalavra);
    }

}
