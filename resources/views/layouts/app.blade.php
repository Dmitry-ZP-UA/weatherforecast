<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/easy-autocomplete.min.css') }}">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">WeatherForecast</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0" method="post">
                @csrf
                <input class="form-control mr-sm-2" name="cityName" type="search" placeholder="Search"
                       aria-label="Search" required id="ajax-post">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <script>
                    var options = {

                        url: function(cityName) {
                            return "ajaxSearch/";
                        },
                        getValue: "name",

                         template: {
                             type: "links",
                             fields: {
                                 link: "id"
                             }
                         },

                        ajaxSettings: {
                            dataType: "json",
                            method: "POST",
                            data: {
                                dataType: "json",
                                _token: "{{ csrf_token() }}"
                            }
                        },

                        preparePostData: function(data) {
                            data.cityName = $("#ajax-post").val();
                            return data;
                        },

                        requestDelay: 400
                    };
                    $("#ajax-post").easyAutocomplete(options);
                </script>
            </form>
        </div>
    </nav>

    <main class="py-4" style="padding: 70px">
        @yield('content')
    </main>
</div>
</body>
</html>