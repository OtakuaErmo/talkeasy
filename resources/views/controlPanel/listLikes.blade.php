@extends('master.layout')

@section('content')

<br><br><br><br><br><br><br><br><br>

    @foreach ($qtd_likes as $item)
        <a href="#">palavra: {{$item->sugestoes->sugestao}} {{$item->qtd_likes}}</a><br>
    @endforeach
@endsection
