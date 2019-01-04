<?php

namespace App\Services;

class CitySearcher
{
    /**
     * @var Elastic
     */
    private $client;

    /**
     * @var RedisCache
     */
    private $cache;

    /**
     * CitySearcher constructor.
     * @param Elastic $client
     * @param RedisCache $cache
     */
    public function __construct(Elastic $client, RedisCache $cache)
    {
        $this->cache = $cache;
        $this->client = $client;
    }

    public function getCityIdByName(string $cityName)
    {
        $cityId = $this->elasticSearch($cityName);

        return $cityId;
    }
    /**
     * @param $data
     * @return mixed
     */
    public function elasticSearch($data)
    {
        $query = [
            'match' => [
                'name' => $data
            ]
        ];

        $params = $this->getParams($query);
        $results = $this->client->search($params);

       return $results['hits']['hits'][0]['_id'];
    }
    /**
     * @return array
     */
    private function getParams($query)
    {
        return [
            'index' => 'location',
            'type' => 'city',
            'body' => [
                'query' => $query
            ]
        ];
    }
}