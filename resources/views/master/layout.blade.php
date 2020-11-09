<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TalkEasy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
    <link rel="sortcut icon" href="{{ url('imagens/talkeasy/aba-logo.png') }}" type="image/x-icon" />;

</head>
<body>
    <nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href={{route('index')}}>
            <img src="{{ url('imagens/talkeasy/libras-logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Talk Easy
          </a>
          @if (!Auth::guest())
            @if (Auth::id() === 1)
                <a class="btn btn-warning border-dark" href="{{route('cpanel.index')}}">PAINEL DE CONTROLE</a>
            @endif
          @endif

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('sugestao') }}">Sugestões<span class="sr-only">(Página sugestões)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Desenvolvedores
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://www.ifsc.edu.br/campus-xanxere" target="_blank">Estudantes do IFSC-Câmpus Xanxerê</a>
                <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href="https://www.facebook.com/anajulia.g.50/" target="_blank">Ana Júlia Giacomeli</a>
              <a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100006929896980" target="_blank">Andressa Vaz</a>
              <a class="dropdown-item" href="https://www.facebook.com/brunohenriquedacosta2003" target="_blank">Bruno Henrique da Costa</a>
              <a class="dropdown-item" href="https://www.facebook.com/emellyvitoriabecker.becker" target="_blank" >Emelly Vitória Becker</a>
              <a class="dropdown-item" href="https://www.facebook.com/guilherme.novello.902" target="_blank">Guilherme Novello</a>
              <a class="dropdown-item" href="https://www.facebook.com/luizpaulografettiterres.grafeti" target="_blank">Luiz Paulo Grafetti Terres</a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item"  target="_blank">Professores Orientadores</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4247586A6" target="_blank">Alex Ricardo Weber</a>
              <a class="dropdown-item" href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8016989P6" target="_blank">Rodrigo Soares da Silva</a>
              <a class="dropdown-item" href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4306740E5" target="_blank">Sabrine Weber</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  target="_blank">Agradecimentos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="https://www.escavador.com/sobre/6767450/jackson-meires-dantas-canuto" target="_blank">Jackson Meires Dantas Canuto</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              LIBRAS
            </a>
            <div class="dropdown-menu" >
                <div class="card-body  " style="width: 18rem;" >
                    <h5 class="card-title">Informações sobre LIBRAS</h5>
                    <p class="card-text text-justify" >
                        LIBRAS significa Língua Brasileira de Sinais.
                        É uma língua gestual-visual que permite se comunicar
                        por meio de gestos, expressões faciais e corporais.
                        É muito utilizada na comunicação com pessoas surdas,
                        sendo uma importante ferramenta de inclusão social.
                    </p>
                </div>
            </div>
          </li>
        </ul>


        <form class="form-inline">

            @if (!Auth::guest())
            <a class="btn btn-outline-info" type="button" href="{{ route('sugestao') }}">Fazer uma sugestão</a>
            @endif
            @if (Auth::guest())
                <a class="btn btn-outline-info" type="button" href="{{route('usuario.login')}}" >Login</a>
                <a class="btn btn-outline-info" type="button" href="{{route('usuario.register')}}">Cadastro</a>
            @else

                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('usuario.logout') }}">
                            Sair
                        </a>
                    </div>

            @endif

          </form>
      </div>
    </nav>

    @yield('content')

    <script src="{{asset('site/jquery.js')}}"></script>
    <script src="{{asset('site/bootstrap.js')}}"></script>
</body>
</html>

