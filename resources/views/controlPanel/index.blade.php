@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">PAINEL DE ADMINISTRAÇÃO</h1>
            <p class="jumbotron-heading">Acesso restrito ao Administrador</p>
        </div>
    </section>


    <div class="container bg-light">
        <div class="row">
          <div class="col">
          </div>
          <div class="col-12">
            <div class="card">
                <div class="card-body border border-dark">
                    <p><b> Identificador de Administração:</b> {{Auth::user()->id}}.<br><b>Administrador:</b> {{Auth::user()->email}}.</p>
                    LOG:
                    @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        <div class=" border border-info alert alert-warning text-info" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                </div>
              </div>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col-12">
                <br>
                <a type="button" href="{{route('like')}}" class="btn btn-warning btn-block border border-dark">Gerenciar Sugestões</a>
                <button type="button" class="btn btn-warning btn-block border border-dark">Warning</button>
                <button type="button" class="btn btn-warning btn-block border border-dark">Warning</button>
                <button type="button" class="btn btn-warning btn-block border border-dark">Warning</button>
                <br>
            </div>
            </div>
            <div class="col">
            </div>
          </div>
    </div>




@endsection
