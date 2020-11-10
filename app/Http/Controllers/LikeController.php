<?php

namespace App\Http\Controllers;

use App\LikeModel;
use App\QTDLikeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$ObjLikes = LikeModel::orderBy('created_at')->get();
        if (Auth::id() === 1) {
            $ObjQTDLikes = QTDLikeModel::orderBy('qtd_likes', 'DESC')->get();
            //$ObjQTDLikes = QTDLikeModel::orderBy('sugestao_id')->get();
            return view('controlPanel.sugestao.listLikes')->with('qtd_likes', $ObjQTDLikes);
        } else {
            return redirect()->route('index')->withErrors('Você não tem permissão para concluir a ação');
        }

        //return view('likes.list')->with(['likes' => $ObjLikes, 'qtd_likes' => $ObjQTDLikes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (DB::table('likes')->where(['usuario_id' => $request->usuario_id, 'sugestao_id' => $request->sugestao_id])->count() == 0) {
            $request->validate([
                'usuario_id' => 'required',
                'sugestao_id' => 'required',
            ]);
            $ObjLikes = new LikeModel();
            $ObjLikes->usuario_id = $request->usuario_id;
            $ObjLikes->sugestao_id = $request->sugestao_id;
            $ObjLikes->save();
            return redirect()->route('sugestao')->withInput()->withErrors(['Você gostou de uma Sugestão!']);
            //return redirect()->back()->withInput()->withErrors(['Você gostou de uma Palavra!']);
        } elseif(DB::table('likes')->where(['usuario_id' => $request->usuario_id, 'sugestao_id' => $request->sugestao_id])->count() == 1) {
            //$objSugestao = SugestaoModel::findOrFail($id);
            //$ObjLikes = LikeModel::findOrFail(['usuario_id' => $request->usuario_id, 'sugestao_id' => $request->sugestao_id]);
            //$data = $ObjLikes->sugestao_id;
           //dd($data);
            DB::table('likes')->where(['usuario_id' => $request->usuario_id, 'sugestao_id' => $request->sugestao_id])->delete();
            //$ObjLikes->delete();
            return redirect()->route('sugestao')->withInput()->withErrors(['Avaliação removida com sucesso!']);
            //return redirect()->back()->withInput()->withErrors(['Você já gostou dessa Palavra!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
