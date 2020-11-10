@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">
                {{$palavra[0]->contextos->contexto}}
            </h1>
            @if (Auth::id() === 1)
                <a class="text-warning" href="{{route('cpanel.palavra.create')}}"><i class="fas fa-plus-circle">Adicionar Palavra</i></a>
            @endif
        </div>
    </section>
    <section id="palavras" class="pb-5 ">
        <div class="container">
            <div class="row">
                <!-- palavras -->
                @foreach ($palavra as $item)    
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid"  src="{{ url('imagens/palavras/'.$item->contextos->contexto.'/'.$item->imagem) }}" style="width: 120px; height: 120px" ></p>

                                            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#{{$video_id = str_replace(' ', '', $item->palavra)}}"  >{{$item->palavra}}</button>
                                            @if (!$item->palavra == null)

                                            <!--Modal: modalYT-->
                                            <div class="modal fade" data-backdrop="static" id="{{$video_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <!--Content-->
                                                    <div class="modal-content">
                                                        <!--Body-->
                                                        <div class="modal-body mb-0 p-0">
                                                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                                                <object type="application/x-shockwave-flash" loop="true" data="https://www.youtube.com/v/{{$item->video_src}}?version=3&autoplay=1&loop=1&playlist={{$item->video_src}}">
                                                                    <param name="movie" value="https://www.youtube.com/v/{{$item->video_src}}?version=3&autoplay=1&loop=1&playlist={{$item->video_src}}" />
                                                                    <param name="allowFullScreen" value="true" />
                                                                    <param name="loop" value="true">
                                                                    <param name="allowscriptaccess" value="always" />
                                                                </object>
                                                            </div>
                                                        </div>
                                                        <!--Footer-->
                                                        <div class="modal-footer justify-content-center flex-column flex-md-row">
                                                            <span class="mr-4">Se for preciso, assista várias vezes ou altere a velocidade do vídeo!</span>
                                                            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                                        data-dismiss="modal" id="{{$item->id}}">Fechar</button>
                                                            <script>
                                                                document.getElementById({{$item->id}}).onclick = function () {
                                                                    location.href = "{{action('PalavraController@index', $item->id_contexto)}}";
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <!--/.Content-->
                                                </div>
                                                <!--/Modal: modal YT-->

                                            </div>
                                            @endif
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
