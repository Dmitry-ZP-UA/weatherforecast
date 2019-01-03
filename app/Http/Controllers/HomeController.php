<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(SearchRequest $request)
    {

        $url = 'https://api.openweathermap.org/data/2.5/forecast?q=Zaporizhzhya,ua&units=metric&APPID='.env('OPEN_WEATHER_MAP_API_KEY');

        $contents = file_get_contents($url);
        $forecast=json_decode($contents);

        return view('home',['forecast' => $forecast]);
    }

}