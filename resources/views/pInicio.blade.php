@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">Talk Easy</h1>
            <p class="jumbotron-heading">Glossário em LIBRAS para crianças</p>
            @if (Auth::id() === 1)
                <a class="text-warning" href="{{route('cpanel.contexto.create')}}"><i class="fas fa-plus-circle">Adicionar Contexto</i></a>
            @endif
            @if ($errors->all())
            @foreach ($errors->all() as $error)
                <div>
                    <p class="text-warning">{{$error}}</p>
                </div>
            @endforeach
        @endif
        </div>
    </section>

    <section id="contextos" class="pb-5 ">
        <div class="container">
            <div class="row">
                <!-- contextos -->
                @foreach ($contexto as $item)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid"  src="{{ url('imagens/contexto/'.$item->imagem) }}" style="width: 120px; height: 120px"></p>
                                            <button type="button" class="btn btn-info btn-lg btn-block" id="{{$item->id}}">{{$item->contexto}}</button>
                                            <script>
                                                document.getElementById({{$item->id}}).onclick = function () {
                                                    location.href = "{{action('PalavraController@index', $item->id)}}";
                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
