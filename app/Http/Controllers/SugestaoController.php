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
            'tipo' => 'required|max:8',
            'cadastrado' => 'required',
        ]);
        $ObjSugestao = new SugestaoModel();
        $ObjSugestao->usuario_id = $request->usuario_id;
        $ObjSugestao->sugestao = ucfirst($request->sugestao);
        $ObjSugestao->tipo = mb_strtoupper($request->tipo);
        $ObjSugestao->cadastrado = mb_strtoupper($request->cadastrado);
        $ObjSugestao->save();
        return redirect()->back()->withInput()->withErrors(['Sugestão ' . mb_strtoupper($request->sugestao, "utf-8") . ' inserida com sucesso!']);
    }

    public function edit($id)
    {
        if (!Auth::id() === 1) {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }
        if (Auth::id() === 1) {
            $objSugestao = SugestaoModel::findorfail($id);
            // $objContexto = ContextoModel::orderBy('id')->get();
            //return view('controlPanel.palavra.editar')->with(['palavra' => $objPalavra, 'contextos' =>$objContexto]);
            return view('controlPanel.sugestao.editar')->with('sugestao', $objSugestao);
            //['likes' => $ObjLikes, 'qtd_likes' => $ObjQTDLikes]
        } else {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }
    }

    public function update(Request $request)
    {
        if (Auth::id() === 1) {
            $request->validate([
                'usuario_id' => 'required',
                'sugestao' => 'required|max:255',
                'tipo' => 'required|max:8',
                'cadastrado' => 'required|max:3'
            ]);

            $objSugestao = SugestaoModel::findorfail($request->id);
            $objSugestao->usuario_id = $request->usuario_id;
            $objSugestao->sugestao = $request->sugestao;
            $objSugestao->tipo = mb_strtoupper($request->tipo);
            $objSugestao->cadastrado = mb_strtoupper($request->cadastrado);

            $objSugestao->save();

            return redirect()->route('sugestao')->withInput()->withErrors(['Sugestao ' . mb_strtoupper($request->sugestao, "utf-8") . ' editada com sucesso!']);
        } else {
            return view('pInicio');
        }
    }

    public function remove($id)
    {
//
            $objSugestao = SugestaoModel::findOrFail($id);
            $data = $objSugestao->sugestao;
            if(Auth::id() === 1){
                $objSugestao->delete();
            }elseif(Auth::id() === $objSugestao->users->id){
                $objSugestao->delete();
            }else{
                return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
            }
            if (Auth::id() === 1) {
            return redirect()->route('cpanel.index')->withInput()->withErrors(['Sugestão ' . mb_strtoupper($data, "utf-8") . ' removida com sucesso!']);
        } else {
            return redirect()->route('sugestao')->withInput()->withErrors(['Sugestão ' . mb_strtoupper($data, "utf-8") . ' removida com sucesso!']);
        }
            //return redirect()->action('PainelController@index')->with('success', 'Aluno Remover com sucesso.');
   //
    //        return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
   //
    }

    public function search(Request $request)
    {
        $query = DB::table('sugestoes');

        if (!empty($request->sugPal)) {
            $query->where('sugestao', 'like',  '%' . $request->sugPal . '%');
        }
        if (!empty($request->sugTip)) {
            $query->where('tipo', 'like',  '%' . $request->sugTip . '%');
        }
        $objSugestao = $query->orderBy('id')->get();
        //dd($objSugestao);
        return view('buscas.pSugestoes')->with('sugestao', $objSugestao);
    }
}
