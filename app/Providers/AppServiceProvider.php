<?php

namespace App\Providers;

use App\Services\Elastic;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    const HOST_ELASTIC = ['0.0.0.0:9200'];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Elastic::class, function ($app) {
            return new Elastic(
                ClientBuilder::create()
                    ->setHosts(self::HOST_ELASTIC)
                    ->build()
            );
        });
    }
}
