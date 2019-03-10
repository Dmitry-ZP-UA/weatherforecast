@extends('layouts.app')

@section('content')

    <h1> {{ $forecast->city->name }},{{ $forecast->city->country}}</h1>
<div style="width:100%; overflow: scroll;">
    <table>
        <tr>
            <th>Forecast</th>
            @foreach($forecast->list as $value)
                <th>
                    <p class="vertical">{{ $value->dt_txt }}</p>
                </th>
            @endforeach

        </tr>
        <tr>
            <td>View</td>
            @foreach($forecast->list as $value)
                <th><img src="http://openweathermap.org/img/w/{{ $value->weather[0]->icon . ".png" }}" style="height: 50px; width: 50px"></th>
            @endforeach

        </tr>
        <tr>
            <td>Temp Max:</td>
            @foreach($forecast->list as $value)
                <th>{{ $value->main->temp_max }}&deg;C</th>
            @endforeach
        </tr>
        <tr>
            <td>Temp Min:</td>
            @foreach($forecast->list as $value)
                <th>{{ $value->main->temp_min }}&deg;C</th>
            @endforeach
        </tr>
    </table>

</div>

@endsection