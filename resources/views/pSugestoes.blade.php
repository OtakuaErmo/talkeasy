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
            <div class="row justify-content-center ">
                <!-- ADICIONAR UMA SUGESTAO -->
                <div class=" col-sm-10">
                    @if (!Auth::guest())
                    <div class="image-flip card border-info mb-3 ontouchstart="this.classList.toggle('hover'); >
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">

                                        <div class="card-header text-center">
                                            Sugestões
                                        </div>
                                        <form method="POST" action="{{ route('sugestao.do') }}">
                                            @csrf
                                            <div class="card-body">
                                                <p class="text-center">Deixe aqui uma sugestão de palavra, contexto  ou melhoria a ser acrescentado:</p>

                                                @if ($errors->all())
                                                    @foreach ($errors->all() as $error)
                                                        <div class=" border border-info alert alert-warning text-info" role="alert">
                                                            {{$error}}
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <input type="hidden" id="id" name="id">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Contexto</label>
                                                        <select name="tipo" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                            <option value="">O que é sua sugestão?</option>
                                                                <option value="palavra">Palavra</option>
                                                                <option value="contexto">Contexto</option>
                                                                <option value="melhoria">Melhoria</option>
                                                        </select>
                                                <input type="hidden" id="usuario_id" name="usuario_id" value="{{Auth::id()}}">

                                                <div class="form-group">
                                                <input type="text" name="sugestao" class="form-control" id="sugestao" maxlength="255">
                                                </div>
                                                <input type="hidden" id="cadastrado" name="cadastrado" value="não">

                                                <button class="btn btn-info" type="submit">Enviar sugestão</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /ADICIONAR UMA SUGESTAO -->
                    @endif
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

                    <!--LISTAGEM DAS SUGESTOES-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Responsável</th>
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
                                        <td scope="row">{{$item->users->name}}</td>
                                        <td scope="row">{{$item->sugestao}}</td>
                                        <td scope="row">{{$item->tipo}}</td>
                                        <td scope="row">{{$item->cadastrado}}</td>
                                        @if (!Auth::guest())
                                        @if (Auth::id() === $item->users->id)
                                        <td>
                                            <a class="btn btn-danger text-light" href="{{action('SugestaoController@remove', $item->id)}}"
                                                onclick="return confirm('Tem certeza que deseja remover {{$item->sugestao}}?');">
                                                <i class="far fa-minus-square"></i>
                                            </a>
                                        </td>
                                        @else
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

                                        @endif

                                        @if (Auth::id() === 1)
                                        <td>
                                            <a class="btn btn-primary text-light" href="{{action('SugestaoController@edit', $item->id)}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger text-light" href="{{action('SugestaoController@remove', $item->id)}}"
                                                onclick="return confirm('Tem certeza que deseja remover {{$item->sugestao}}?');">
                                                <i class="far fa-minus-square"></i>
                                            </a>
                                        </td>
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
