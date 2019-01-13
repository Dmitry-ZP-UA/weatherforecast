<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class HomeController extends Controller
{

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