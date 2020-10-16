@extends('master.layout')

@section('content')

<section class="jumbotron text-center pb-5 pt-5 card text-white bg-info mb-5 mt-4">
    <div class="container pt-4">
        <h1 class="jumbotron-heading">Cadastro</h1>
        <p class="jumbotron-heading">Registre-se como usuário!</p>
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
                                        Cadastro
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('usuario.register') }}">
                                            @csrf
                                                <p class="text-center">Realize seu cadastro no site para deixar sua sugestão</p>
                                                <div class="form-group">
                                                <label for="name">Nome</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="NameHelp" placeholder="Seu nome" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                                <div class="form-group">
                                                <label for="email">Endereço de email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Seu email" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Senha</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirmar Senha</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha" required autocomplete="new-password">
                                            </div>
                                                <button type="submit" class="btn btn-info">
                                                    Confirmar Cadastro
                                                </button>
                                        </form>
                                    </div>
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
