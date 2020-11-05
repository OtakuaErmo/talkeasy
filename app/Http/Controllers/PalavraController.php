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
        return view("controlPanel.adicionarPalavra")->with('contextos', $objContextos);;
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
            $ObjPalavra->palavra = $request->palavra;
            $ObjPalavra->imagem = $request->imagem;
            $ObjPalavra->video_src = $request->vide_src;
            $ObjPalavra->save();
            return redirect()->back()->withInput()->withErrors(['Palavra inserida com sucesso!']);
        }

    }

    public function remove($id)
    {
        if (Auth::id() === 1) {
            $ObjPalavra = PalavraModel::findOrFail($id);
            $data = $ObjPalavra->palavra;
            $ObjPalavra->delete();

            return redirect()->back()->withInput()->withErrors(['Palavra '.$data.' removida com sucesso!']);
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
        }

    }

    public function showAll()
    {
        if (Auth::id() === 1) {
            $ObjPalavras = PalavraModel::orderBy('id_contexto', 'DESC')->paginate(15);
            return view('controlPanel.removerPalavra')->with('palavras', $ObjPalavras);
        }

    }


    public function search(Request $request)
    {
        $query = DB::table('palavras');

        if (!empty($request->palavra)) {
            $query->where('palavra', 'like',  '%' . $request->palavra . '%');
        }

        $objPalavra = $query->orderBy('id', 'DESC')->paginate(15);
        //dd($objPalavra);
        return view('buscas.listRemoverPalavras')->with('palavras', $objPalavra);
    }

}
