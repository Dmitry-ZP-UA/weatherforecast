<?php

namespace App\Services;

class WeatherService
{
    /**
     * @var RedisCache
     */
    private $cache;

    /**
     * @var CitySearcher
     */
    private $searcher;

    /**
     * WeatherService constructor.
     * @param CitySearcher $searcher
     * @param RedisCache $cache
     */
    public function __construct(CitySearcher $searcher, RedisCache $cache)
    {
        $this->cache = $cache;
        $this->searcher = $searcher;
    }

    /**
     * @param $cityName
     * @return mixed
     */
    public function getForecast($cityName)
    {
        if(($this->cache->getCache($cityName))){
            return $this->cache->getCache($cityName);
        }

        $cityId = $this->searcher->getCityIdByName($cityName);
        $url = 'https://api.openweathermap.org/data/2.5/forecast?id='.$cityId.'&units=metric&APPID='.env('OPEN_WEATHER_MAP_API_KEY');
        $contents = file_get_contents($url);
        $this->cache->setCache($cityName, $contents);

        return json_decode($contents);
    }

}