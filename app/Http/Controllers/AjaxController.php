<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\CitySearcher;

class AjaxController
{
    /**
     * @var CitySearcher
     */
    private $searcher;

    /**
     * AjaxController constructor.
     * @param CitySearcher $searcher
     */
    public function __construct(CitySearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    /**
     * @param SearchRequest $request
     * @return false|string
     */
    public function index(SearchRequest $request)
    {
        $results = $this->searcher->elasticSearch($request->cityName);

        return json_encode($results);
    }
}