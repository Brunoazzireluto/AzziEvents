@extends('layouts.main')
@section('title', 'Azzi Events')

@section('content')
    <h1 >Algo</h1>

    @if (10 > 50)
        <p>Condição True</p>
    @endif
    @if ($nome == "Bruno")
        <p> Olá meu nome é {{$nome}} e eu tenho {{$idade}} é trabalho com {{$profissao}}</p>
    @elseif ($nome == "Brunos")
        <p> Olá meu nome Não é {{$nome}}</p>
    @else
        <p>O nome não é Bruno</p>
    @endif

    @for ($i = 0; $i < count($arr); $i++)
    @if ($i == 3)
        <p>O i é {{$i}}</p>
    @endif
        <p>{{$arr[$i]}} - {{$i}}</p>
    @endfor

    @php
        $name = "Azzi";
        echo $name;
    @endphp
    <!--Cometario em html (renderiza no html) -->
    {{-- Comentario do Blade (Não rendereiza no html) --}}

    @foreach ($nomes as $nome)
        <p>{{$loop->index}}</p>
        <p>{{$nome}}</p>
    @endforeach
@endsection
