@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">Sugestões</h1>
            <p class="jumbotron-heading">Faça seu <a href="{{ route('usuario.login') }}" class="text-danger">CADASTRO</a> para deixar uma sugestão!</p>
        </div>
    </section>

    <section id="sugestao" class="pb-5">
        <div class="container ">
            <div class="row justify-content-center ">
                <!-- ADICIONAR UMA SUGESTAO -->
                <div class=" col-sm-10">
                    @if (!Auth::guest())
                    <div class="image-flip card border-info mb-3 ontouchstart="this.classList.toggle('hover'); >
                        <div class="mainflip ">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">

                                        <div class="card-header text-center">
                                            Sugestões
                                        </div>
                                        <form method="POST" action="{{ route('sugestao.do') }}">
                                            @csrf
                                            <div class="card-body">
                                                <p class="text-center">Deixe aqui uma sugestão de melhoria, palavra ou gesto a ser acrescentado</p>

                                                @if ($errors->all())
                                                    @foreach ($errors->all() as $error)
                                                        <div class=" border border-info alert alert-warning text-info" role="alert">
                                                            {{$error}}
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="form-group">
                                                <label for="InputName">Nome</label>
                                                <input type="name" name="responsavel" class="form-control" value="{{Auth::user()->name}}" id="InputName" aria-describedby="nameHelp" placeholder="Escreva seu nome">

                                                </div>
                                                <div class="form-group">
                                                <label for="palavra">Sugestão</label>
                                                <input type="text" name="sugestao" class="form-control" id="sugestao">
                                                </div>
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

                    <!--LISTAGEM DAS SUGESTOES-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Sugestão</th>
                                </tr>
                            </thead>
                            @foreach ($sugestao as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$item->id}}</th>
                                        <td scope="row">{{$item->responsavel}}</td>
                                        <td scope="row">{{$item->sugestao}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!--/LISTAGEM DAS SUGESTOES-->
                </div>
            </div>
        </div>
    </section>

@endsection
