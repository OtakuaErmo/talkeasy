@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">Sugestões</h1>
            <p class="jumbotron-heading">Busque por uma sugestão!</p>
        </div>
    </section>

    <section id="sugestao" class="pb-5">
        <div class="container">
            @if (Auth::id() === 1)
            <a href="{{ route('cpanel.index') }}"><i class="fas fa-long-arrow-alt-left"> VOLTAR PARA O PAINEL DE ADMINISTRAÇÃO</i></a><br>
            <a href="{{ route('sugestao') }}"><i class="fas fa-long-arrow-alt-left"> VOLTAR PARA AS SUGESTÕES</i></a><br>
            <a href="{{ route('like') }}"><i class="fas fa-long-arrow-alt-left"> VOLTAR PARA O GERENCIAMENTO DE SUGESTÕES</i></a>
            @else
            <a href="{{ route('sugestao') }}"><i class="fas fa-long-arrow-alt-left"> VOLTAR PARA SUGESTÕES</i></a>
            @endif
                    <br><br>
                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class=" border border-info alert alert-warning text-info" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <div class="row justify-content-center ">
                        <div class=" col-sm-10">
                            <form action="{{ action('SugestaoController@search')}}" method="POST">
                                @csrf
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Sugestão</span>
                                    </div>
                                    <input type="text" name="sugPal" class="form-control" placeholder="Busque por alguma sugestão já adicionada!" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">Tipos</span>
                                        </div>
                                        <select name="sugTip" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option value="">Caso prefira, filtre por tipos!</option>
                                                <option value="palavra">Palavra</option>
                                                <option value="contexto">Contexto</option>
                                                <option value="melhoria">Melhoria</option>
                                        </select>
                                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--LISTAGEM DAS SUGESTOES-->
                    <div class="row justify-content-center ">
                        <div class=" col-sm-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sugestão</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Cadastrada</th>
                                            @if (!Auth::guest())
                                            <th scope="col">Avaliar</th>
                                            @endif
                                            @if (Auth::id() === 1)
                                            <th scope="col">Editar</th>
                                            <th scope="col">Remover</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    @foreach ($sugestao as $item)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{$item->id}}</th>
                                                <td scope="row">{{$item->sugestao}}</td>
                                                <td scope="row">{{$item->tipo}}</td>
                                                <td scope="row">{{$item->cadastrado}}</td>
                                                @if (!Auth::guest())
                                                <th scope="row">
                                                    <form action="{{action('LikeController@store')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::id()}}">
                                                        <input type="hidden" name="sugestao_id" id="sugestao_id" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class=" fa fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                </th>
                                                @endif
                                                @if (Auth::id() === 1)
                                                <td>
                                                    <a class="btn btn-primary text-light" href="{{action('SugestaoController@edit', $item->id)}}">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td><a class="btn btn-danger text-light" href="{{action('SugestaoController@remove', $item->id)}}" onclick="return confirm('Tem certeza que deseja remover {{$item->sugestao}}?');"><i class="far fa-minus-square"></i></a></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/LISTAGEM DAS SUGESTOES-->

                </div>
            </div>
        </div>
    </section>

@endsection
