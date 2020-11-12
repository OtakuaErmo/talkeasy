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
        //dd($ObjPalavras[0]->id);
        if (empty($ObjPalavras[0])) {
            return redirect()->back()->withInput()->withErrors(['Desculpe, mas esse contexto não possui palavras cadastradas!']);
            //return redirect()->route('index');
        }else{
            return view('pPalavras')->with('palavra', $ObjPalavras);
        }

    }

    public function create()
    {
        if (Auth::id() === 1) {
            $objContextos = ContextoModel::orderBy('id')->get();
            return view("controlPanel.palavra.adicionar")->with('contextos', $objContextos);
        } else{
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }

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
        if (!Auth::id() === 1) {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }
        if (Auth::id() === 1) {
            $objPalavra = PalavraModel::findorfail($id);
            $objContexto = ContextoModel::orderBy('id')->get();
            return view('controlPanel.palavra.editar')->with(['palavra' => $objPalavra, 'contextos' =>$objContexto]);
            //['likes' => $ObjLikes, 'qtd_likes' => $ObjQTDLikes]
        } else{
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }
    }

    public function update(Request $request)
    {
        if (Auth::id() === 1) {
        $request->validate([
            'id_contexto' => 'required',
            //'palavra' => 'required|max:50',
            'imagem' => 'required',
            //'video_src' => 'required|max:50'
        ]);

        $objPalavra = PalavraModel::findorfail($request->id);
        $objPalavra->id_contexto = $request->id_contexto;
        $objPalavra->palavra = $request->palavra;
        $objPalavra->imagem = $request->imagem;
        $objPalavra->video_src = $request->video_src;

        $objPalavra->save();

        return redirect()->route('cpanel.palavra.list')->withInput()->withErrors(['Palavra '.mb_strtoupper($request->palavra, "utf-8").' editada com sucesso!']);
        } else {
            return view('pInicio');
        }
    }

    public function remove($id)
    {
        if (Auth::id() === 1) {
            $ObjPalavra = PalavraModel::findOrFail($id);
            $data = $ObjPalavra->palavra;
            $ObjPalavra->delete();

            return redirect()->route('cpanel.palavra.list')->withInput()->withErrors(['Palavra '.mb_strtoupper($data,"utf-8").' removida com sucesso!']);
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
        } else {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }

    }

    public function showAll()
    {
        if (Auth::id() === 1) {
            $ObjPalavras = PalavraModel::orderBy('id_contexto', 'DESC')->paginate(15);
            return view('controlPanel.palavra.list')->with('palavras', $ObjPalavras);
        } else {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
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
