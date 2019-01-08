<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\CitySearcher;

class SearchController extends Controller
{
    /**
     * @var CitySearcher
     */
    private $search;

    /**
     * SearchController constructor.
     * @param CitySearcher $search
     */
    public function __construct(CitySearcher $search)
    {
        $this->search = $search;
    }

    /**
     * @param SearchRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SearchRequest $request)
    {
        $results = $this->search->elasticSearch($request->cityName);

        return view('search-result', ['results' => $results]);
    }

}