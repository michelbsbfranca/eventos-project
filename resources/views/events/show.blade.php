@extends('layouts.main')

@section('title', $event->title)

@section('content')


<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        </div>
        <div class="col-md-6" id="info-container">
           <h1> {{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/y', strtotime($event->date)) }}</p>
              <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
              <p class="event-participants"><ion-icon name="people-outline"></ion-icon> X Participantes</p>
              <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Dono do evento</p>
            <h3> Incluso no evento :</h3>
              @foreach ($event->items as $item )
                    <p class="event-items"><ion-icon name="checkmark-outline"></ion-icon> {{ $item }}</p>                    
              @endforeach
              <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>           
        </div>
        <div class="col-md-6" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>





@endsection