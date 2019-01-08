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
     * @param $cityId
     * @return mixed
     */
    public function getForecast($cityId)
    {
        if(($cache = $this->cache->getCache($cityId))){
            return $cache;
        }

        $url = 'https://api.openweathermap.org/data/2.5/forecast?id='.$cityId.'&units=metric&APPID='.env('OPEN_WEATHER_MAP_API_KEY');
        $contents = file_get_contents($url);

        $this->cache->setCache($cityId, $contents);

        return json_decode($contents);
    }

}