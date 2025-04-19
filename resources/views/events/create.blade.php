@extends('layouts.main')

@section('title', 'Create Event')

@section('content')
<div class="container-fluid mt-5">
    <h1 class="mb-4">Criar Evento</h1>

    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="img">imagem do Evento:</label>
            <input type="file" class="form-control-file" id="title" name="image">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Título do Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Data:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label class="form-group">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="items" name="items[]" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="items" name="items[]" value="OpenFood">OpenFood
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="items" name="items[]" value="OpenBar">OpenBar
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="items" name="items[]" value="Brindes">Brindes
            </div>
            
        </div>

        <div class="mb-4">
            <label for="private" class="form-label">Privado:</label>
            <select class="form-select" id="private" name="private" required>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
</div>
@endsection
