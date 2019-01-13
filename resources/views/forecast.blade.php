@extends('layouts.app')

@section('content')

    <h1> {{ $forecast->city->name }},{{ $forecast->city->country}}</h1>
    <div style="padding-top: 30px">
            @foreach($forecast->list as $value)
                        <div style="display: flex">
                            <h5 class="card-title">{{ $value->dt_txt }}</h5>
                            <img src="http://openweathermap.org/img/w/{{ $value->weather[0]->icon . ".png" }}" style="height: 50px; width: 50px">
                            <p class="card-text">Temp Max: {{ $value->main->temp_max }}&deg;C</p>
                            <p class="card-text">Temp Min: {{ $value->main->temp_min }}&deg;C</p>
                        </div>

            @endforeach
    </div>

@endsection