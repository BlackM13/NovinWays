<?php

namespace Parsidev\Novinways;

use Illuminate\Support\ServiceProvider;
use SoapClient;

class NovinwaysServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/novinways.php', 'novinways');

        $this->app->singleton(Novinways::class, function () {

            $config = config('novinways');

            $client = new SoapClient($config['webServiceUrl'], [
                'encoding' => 'UTF-8',
                'exceptions' => true,
            ]);

            return new Novinways($config, $client);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/novinways.php' => config_path('novinways.php'),
        ], 'novinways-config');
    }
}