@extends('layouts.main')
@section('title', 'Azzi Events')

@section('content')

    <div id="search-container" class="col-md-12 ">
        <h1 class="fw-bold">Busque um evento</h1>
        <form action="/" method="GET" class="row">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar"/>
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
           <h2>Buscando por: {{$search}}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    @if ($event->image)
                        <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                    @else
                    <img src="/img/event_placeholder.jpg" alt="{{$event->title}}">
                    @endif
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-participants">x participantes</p>
                        <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>
            @endforeach
            @if (count($events) == 0 && $search)
                <p>Não foi possivel encontrar nenhum evento com: {{$search}}!</p>
                <a href="/" class="btn btn-outline-info w-25">Ver todos os eventos</a>
            @elseif(count($events) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection
{{-- parei na aula 25 --}}
