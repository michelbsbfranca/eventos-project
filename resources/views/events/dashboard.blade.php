@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')


<div>
    <h1>
        Meus Eventos
    </h1>
</div>

<div>
    @if(count($events) > 0)
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Participantes</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            @foreach($events as $event)
                <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>0</td>
                    <td>{{ date('d/m/Y', strtotime($event->date)) }}</td>
                    <td><a href="#" class="btn btn-primary btn-sm" style="margin-right:10px;">Editar</a>
                        <form action="/events/{{ $event->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este evento?')">Deletar</button>
                        </form>
                        
                </tr>
            @endforeach
        </table>
        @else
        <p>Você ainda não tem eventos, <a href="/events/create">crie um evento</a></p>
    @endif
</div>


@endsection