<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Elasticsearch\ClientBuilder;

class HomeController extends Controller
{
    const HOST_ELASTIC = ['localhost:9200'];

    /**
     * @param $cityId
     * @param WeatherService $forecast
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($cityId, WeatherService $forecast)
    {
        $forecast = $forecast->getForecast($cityId);

        return view('forecast',['forecast' => $forecast]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

}