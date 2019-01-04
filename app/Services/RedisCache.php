<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class RedisCache
{
    /**
     * @param string $param
     * @return mixed
     */
    public function getCache(string $param)
    {
        $data = Redis::get($param);
        $result = json_decode($data);

        return $result;
    }
    /**
     * @param $key
     * @param $value
     */
    public function setCache(string $key, $value)
    {
        Redis::set($key, $value);
        Redis::expire($key, 1000);
    }
}