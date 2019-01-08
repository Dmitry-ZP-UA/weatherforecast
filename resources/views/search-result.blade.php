@extends('layouts.app')

@section('content')

    @if($results)
        @foreach($results as $result)
            <a href="/{{ $result['id'] }}">
                <h2>{{ $result['name'] }}, {{ $result['country'] }}</h2>
            </a>
        @endforeach

        @else
        <h2>Nothing found</h2>
    @endif


@endsection