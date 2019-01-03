@extends('layouts.app')

@section('content')

    <h1> {{ $forecast->city->name }},{{ $forecast->city->country}}</h1>
    <section>
        <div class="row">
            @foreach($forecast->list as $value)
                <div class="card-deck">
                    <div class="card">
                        <img src="http://openweathermap.org/img/w/{{ $value->weather[0]->icon . ".png" }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->dt_txt }}</h5>
                            <p class="card-text">{{ $value->weather[0]->description }}</p>
                            <p class="card-text">Temp Max: {{ $value->main->temp_max }}&deg;C</p>
                            <p class="card-text">Temp Min: {{ $value->main->temp_min }}&deg;C</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection