@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">PAINEL DE ADMINISTRAÇÃO</h1>
            <p class="jumbotron-heading">Adicionar uma nova PALAVRA</p>
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
                    <form action="{{ action('PalavraController@store')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Contexto</label>
                            <select name="id_contexto" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="">Defina um contexto</option>
                        @foreach ($contextos as $contexto)
                            <option value="{{$contexto->id}}">
                                {{$contexto->contexto}}
                            </option>
                        @endforeach
                        </select>
                        <br><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Palavra</span>
                            </div>
                            <input type="text" name="palavra" class="form-control" placeholder="palavra" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">public\imagens\palavras\</span>
                            </div>
                            <input type="text" name="imagem" class="form-control" placeholder="Não esqueça de fazer upload das imagens na pasta!" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">https://youtu.be/</span>
                            </div>
                            <input type="text" name="video_src" class="form-control" placeholder="Não esqueça de fazer upload dos vídeos no youtube!" aria-label="Busque por alguma sugestão já adicionada!" aria-describedby="basic-addon1">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info ">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </section>

@endsection
