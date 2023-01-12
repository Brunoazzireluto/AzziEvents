@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<script>
 const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($events) > 0)
        <table class="table table-striped align-middle">
            <thead>
                <tr class="table-info">
                    <th scope="col" class="text-center" >#</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Participantes</th>
                    <th scope="col" class="text-center">Ações</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($events as $event)
                    <tr>
                        <th scope="row" class="text-center">{{$loop->index+1}}</th>
                        <td class="text-center"><a href="/events/{{$event->id}}" class="link-info">{{$event->title}}</a></td>
                        <td class="text-center">0</td>
                        <td class="text-center">
                            <div class="row">
                                <a href="/events/edit/{{$event->id}}" class="btn btn-info col w-25" title="Editar">
                                    <ion-icon name="build"></ion-icon> Editar
                                </a>
                                    <form action="/events/{{$event->id}}" method="POST" class="col">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" >
                                            <ion-icon name="trash-bin"></ion-icon> Deletar
                                        </button>
                                    </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem eventos!</p>
        <a href="/events/create" class="btn btn-outline-info w-25">Criar Evento</a>
    @endif
</div>

@endsection
