@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">PAINEL DE ADMINISTRAÇÃO</h1>
            <p class="jumbotron-heading">Listagem completa das PALAVRAS</p>
        </div>
    </section>

    <section id="removerpalavra" class="pb-5">
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
                    <form action="{{ action('PalavraController@search')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Buscar</span>
                            </div>
                            <input type="text" name="palavra" class="form-control" placeholder="Busque por palavra" aria-label="Busque por palavra" aria-describedby="basic-addon1">
                            <button type="submit" class="btn btn-info">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class=" col-sm-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">PALAVRA</th>
                                    <th scope="col">Contexto Id</th>

                                    @if (Auth::id() === 1)
                                    <th scope="col">Editar</th>
                                    <th scope="col">Remover</th>
                                    @endif
                                </tr>
                            </thead>
                            @foreach ($palavras as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$item->id}}</th>
                                        <td scope="row">{{$item->palavra}}</td>
                                        <td scope="row">{{$item->contextos->contexto}}</td>

                                        @if (Auth::id() === 1)
                                        <td>
                                            <a class="btn btn-primary text-light" href="{{action('PalavraController@edit', $item->id)}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger text-light" href="{{action('PalavraController@remove', $item->id)}}"
                                            onclick="return confirm('Tem certeza que deseja remover {{$item->palavra}}?');">
                                                <i class="far fa-minus-square"></i>
                                            </a>
                                        </td>
                                        @endif

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    {{$palavras->links()}}
                </div>
            </div>
        </div>
        @endif
    </section>

@endsection
