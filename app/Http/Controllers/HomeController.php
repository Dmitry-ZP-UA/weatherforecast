<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param SearchRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(SearchRequest $request)
    {
        $url = 'https://api.openweathermap.org/data/2.5/forecast?q='.$request->search.',ua&units=metric&APPID='.env('OPEN_WEATHER_MAP_API_KEY');

        $contents = file_get_contents($url);
        $forecast=json_decode($contents);

        return view('forecast',['name_city' => $request->search,'forecast' => $forecast]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

}