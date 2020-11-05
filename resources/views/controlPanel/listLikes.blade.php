@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">PAINEL DE ADMINISTRAÇÃO</h1>
            <p class="jumbotron-heading">Gerenciar Sugestões</p>
        </div>
    </section>

    <section id="sugestao" class="pb-5">
        <div class="container">
            <div class="row justify-content-center ">
                <div class=" col-sm-10">
                    <div class="card">
                        <div class="card-body border border-dark">

                            LOG:
                            @if ($errors->all())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        </div>
                      </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class=" col-sm-10">
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
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class=" col-sm-10">

                    @if (Auth::id() === 1)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Avaliações Positivas</th>
                                        <th scope="col">Sugestão</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Remover</th>
                                    </tr>
                                </thead>
                                @foreach ($qtd_likes as $qtd_like)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$qtd_like->qtd_likes}}</th>
                                            <td scope="row">{{$qtd_like->sugestoes->sugestao}}</td>
                                            <td><a href=""><i class="far fa-edit"></i></a></td>
                                            <td><a class="text-danger" href="{{action('SugestaoController@remove', $qtd_like->sugestao_id)}}" onclick="return confirm('Tem certeza que deseja remover {{$qtd_like->sugestoes->sugestao}}?');"><i class="far fa-minus-square"></i></a></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
