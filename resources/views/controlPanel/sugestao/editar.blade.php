@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">PAINEL DE ADMINISTRAÇÃO</h1>
            <p class="jumbotron-heading">Editar SUGESTÃO</p>
        </div>
    </section>

    <section id="sugestao" class="pb-5">
        @if (Auth::id() === 1)
        <div class="container">
            <div class="row justify-content-center ">
                <div class=" col-sm-10">
                    <div class="card">
                        <div class="card-body border border-dark">
                            LOG:
                            @if ($errors->all())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center ">
                <div class=" col-sm-10">
                    <form action="{{ action('SugestaoController@update')}}" method="POST">
                        @csrf
                    <input type="hidden" id="id" name="id" value="{{$sugestao->id}}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Responsável</span>
                            </div>
                        <input type="text" name="usuario_id" value="{{$sugestao->usuario_id}}" class="form-control" placeholder="palavra" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Sugestão</span>
                            </div>
                        <input type="text" name="sugestao" value="{{$sugestao->sugestao}}" class="form-control" placeholder="Não esqueça de fazer upload das imagens na pasta!" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Tipo</span>
                            </div>
                        <select name="tipo" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="{{$sugestao->tipo}}">{{$sugestao->tipo}}</option>
                                <option value="palavra">Palavra</option>
                                <option value="contexto">Contexto</option>
                                <option value="melhoria">Melhoria</option>
                        </select>
                        <!--
                        <input type="text" name="tipo" value="{{--$sugestao->tipo--}}" class="form-control"
                        placeholder="Não esqueça de fazer upload dos vídeos no youtube!"
                        aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1"
                        readonly>
                    -->
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Cadastrado</span>
                            </div>
                            <select name="cadastrado" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="{{ $sugestao->cadastrado }}">{{ $sugestao->cadastrado }}</option>
                            @if ($sugestao->cadastrado === 'NÃO')
                                <option value="SIM">SIM</option>
                            @else
                                <option value="NÃO">NÃO</option>
                            @endif
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info ">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </section>
@endsection
