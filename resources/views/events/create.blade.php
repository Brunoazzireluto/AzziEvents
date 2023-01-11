@extends('layouts.main')
@section('title', 'Criar Evento')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Criar Novo evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4 mt-3">
            <label for="image">Imagem do evento:</label>
            <input type="file", id="image", name="image" class="form-control">

        </div>
        <div class="mb-3">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title"
             name="title" placeholder="Nome do Evento">
        </div>
        <div class="mb-3">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date"
             name="date">
        </div>
        <div class="mb-3">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city"
             name="city" placeholder="Local do Evento">
        </div>
        <div class="mb-3">
            <label for="title">O Evento é Privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description"
             class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
        </div>
        <div class="mb-4">
            <label for="title" class="mb-2">Adicione itens de infraestrutura:</label>
            <div class="mb-1">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="mb-1">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="mb-1">
                <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
            </div>
            <div class="mb-1">
                <input type="checkbox" name="items[]" value="Open Food"> Open food
            </div>
            <div class="mb-1">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <input type="submit" value="Criar Evento" class="btn btn-primary">
    </form>
</div>
@endsection
