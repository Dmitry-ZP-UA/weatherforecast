<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\CitySearcher;
use App\Services\WeatherService;

class HomeController extends Controller
{

    /**
     * @var CitySearcher
     */
    private $search;

    /**
     * HomeController constructor.
     */
    public function __construct(CitySearcher $search)
    {
        $this->search = $search;
    }

    /**
     * @param SearchRequest $request
     * @param WeatherService $forecast
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(SearchRequest $request, WeatherService $forecast)
    {
        $forecast = $forecast->getForecast($request->cityName);

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