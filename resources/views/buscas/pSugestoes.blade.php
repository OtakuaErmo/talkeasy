@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">Sugestões</h1>
            <p class="jumbotron-heading">Faça seu <a href="{{ route('usuario.login') }}" class="text-danger">CADASTRO</a> para deixar uma sugestão!</p>
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
                    <form action="{{ action('SugestaoController@search')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Buscar</span>
                            </div>
                            <input type="text" name="sugestao" class="form-control" placeholder="Busque por alguma sugestão já adicionada!" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1">
                            <button type="submit" class="btn btn-info">Buscar</button>
                        </div>
                    </form>
                    <!--LISTAGEM DAS SUGESTOES-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Responsável ID</th>
                                    <th scope="col">Sugestão</th>
                                    @if (!Auth::guest())
                                    <th scope="col">Avaliar</th>
                                    @endif
                                    @if (Auth::id() === 1)
                                    <th scope="col">Remover</th>
                                    @endif
                                </tr>
                            </thead>
                            @foreach ($sugestao as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$item->id}}</th>
                                        <td>{{$item->usuario_id}}</td>
                                        <td scope="row">{{$item->sugestao}}</td>
                                        @if (!Auth::guest())
                                        <th scope="row">
                                            <form action="{{action('LikeController@store')}} " method="POST">
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
                                        <td><a class="text-danger" href="{{action('SugestaoController@remove', $item->id)}}" onclick="return confirm('Tem certeza que deseja remover {{$item->sugestao}}?');"><i class="far fa-minus-square"></i></a></td>
                                        @endif
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!--/LISTAGEM DAS SUGESTOES-->
                    {{$sugestao->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection
