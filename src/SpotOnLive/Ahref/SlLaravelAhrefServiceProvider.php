<?php

namespace SpotOnLive\Ahref;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;
use SpotOnLive\Ahref\Services\AhrefService;
use SpotOnLive\Ahref\Services\GuzzleService;

class SlLaravelAhrefServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('ahref.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AhrefService::class, function (Application $app) {
            $guzzleService = $app->make(GuzzleService::class);
            return new AhrefService($this->getConfig(), $guzzleService);
        });
        $this->app->bind(GuzzleService::class, function (Application $app) {
            return new GuzzleService($this->getConfig());
        });
        $this->mergeConfig();
    }

    /**
     * Merge config
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php',
            'ahref'
        );
    }

    /**
     * @return array
     */
    private function getConfig()
    {
        if (!$config = config('ahref')) {
            return [];
        }
        return $config;
    }
}