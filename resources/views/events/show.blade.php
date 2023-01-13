@extends('layouts.main')
@section('title', $event->title)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->title}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city"><ion-icon name="location"></ion-icon>{{$event->city}}</p>
                <p class="event-participants"><ion-icon name="people"></ion-icon> {{count($event->users)}} Participantes</p>
                <p class="event-owner"><ion-icon name="star"></ion-icon> {{$eventOwner['name']}}</p>
                @if (!$hasUserJoined)
                    <form action="/events/join/{{$event->id}}" method="POST">
                        @csrf
                        <a href="/events/join/{{$event->id}}" class="btn btn-primary"
                            id="event-submit"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            >Confirmar Presença</a>
                    </form>
                @else
                    <div class=" border border-info mx-2 my-4 px-2  bg-info-subtle text-center w-75 ">
                        <p class="fs-5">você já está participando deste Evento</p>
                    </div>
                @endif
                <h3>O evento conta com:</h3>
                <ul id="items-list" class="list-group list-group-flush">
                    @foreach ($event->items as $item)
                        <li class="list-group-item"><ion-icon name="play" class="align-middle"></ion-icon>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection
