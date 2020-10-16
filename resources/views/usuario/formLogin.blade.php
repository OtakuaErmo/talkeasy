@extends('master.layout')

@section('content')

    <section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
        <div class="container pt-4">
            <h1 class="jumbotron-heading">Entrar</h1>
            <p class="jumbotron-heading">Entre suas informações!</p>
        </div>
    </section>
    <section id="team" class="pb-5  ">
        <div class="container ">
            <div class="row justify-content-center ">
                <!-- Team member -->
                <div class=" col-sm-6  ">
                    <div class="image-flip card border-info mb-3 ontouchstart="this.classList.toggle('hover'); >
                        <div class="mainflip ">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">

                                        <div class="card-header text-center">
                                            Login
                                        </div>
                                        <form method="POST" action="{{ route('usuario.login.do') }}">
                                            @csrf
                                            <div class="card-body">
                                                <p class="text-center">Realize login para entrar no site e deixar sua sugestão</p>

                                                @if ($errors->all())
                                                    @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$error}}
                                                      </div>
                                                    @endforeach
                                                @endif

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email" required autocomplete="email" autofocus>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required autocomplete="current-password">
                                            </div>

                                            <button class="btn btn-info" type="submit">Entrar</button>
                                            </div>
                                        </form>
                                        <a class="text-info" href="{{ route('usuario.register') }}">Ainda não possui uma conta?</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
