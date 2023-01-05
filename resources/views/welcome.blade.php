@extends('layouts.main')
@section('title', 'Azzi Events')

@section('content')
    <h1 class="fw-bold m-2 text-start">Algo</h1>

    @foreach ($events as $event)
        <p>{{$event->title}} - {{$event->description}}</p>

    @endforeach
@endsection

{{-- //parei na aula 14 --}}
