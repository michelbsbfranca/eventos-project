@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid mt-5">
    {{-- Campo de busca --}}
    <div id="search-container" class="row mb-5 justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Busque um Evento</h1>
            <form action="/" method="GET">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..." value="{{ $search ?? '' }}">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Lista de eventos --}}
    <div id="events-container" class="row">

        @if($search)
            <h3 class="text-center mb-4">Resultados para: "{{ $search }}"</h3>
        @else
            <h3 class="text-center mb-4">Eventos agendados</h3>
        @endif   

        <div id="cards-container" class="row g-4">
            @forelse($events as $event)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-1 rounded-3">
                        <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">{{ date('d/m/y', strtotime($event->date)) }}</p>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">X participantes</p>
                            <a href="/events/{{ $event->id }}" class="btn btn-sm btn-primary mt-auto">Saber mais</a>
                            <form action="/events/{{ $event->id }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100"
                                    onclick="return confirm('Tem certeza que deseja deletar este evento?')">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                @if($search)
                    <div class="col-12 text-center text-muted">
                        <p>Não foi possível encontrar eventos com "{{ $search }}". <a href="/">Ver todos eventos</a></p>
                    </div>
                @else
                    <div class="col-12 text-center text-muted">
                        <p>Nenhum evento encontrado.</p>
                    </div>
                @endif
            @endforelse
        </div>
    </div>
</div>

@endsection
