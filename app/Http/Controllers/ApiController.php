<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class ApiController
{
    /**
     * @var WeatherService
     */
    private $forecast;

    /**
     * ApiController constructor.
     * @param WeatherService $forecast
     */
    public function __construct(WeatherService $forecast)
    {
        $this->forecast = $forecast;
    }

    /**
     * @param $apiKey
     * @param $cityId
     * @return false|string
     */
    public function getForecast($apiKey, $cityId)
    {
        if(!($apiKey == 99999900000)){
            return 'Error!!! No valid apiKey';
        }
        $result = $this->forecast->getForecast($cityId);

        return json_encode($result);
    }

}