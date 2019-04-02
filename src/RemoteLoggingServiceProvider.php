<?php

namespace SevenLab\RemoteLogging;

use Illuminate\Support\ServiceProvider;

class RemoteLoggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/remote-logging.php' => config_path('remote-logging.php'),
            __DIR__ . '/../config/failed-job-monitor.php' => config_path('failed-job-monitor.php'),
        ], 'config');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/remote-logging.php', 'remote-logging');
        $this->mergeConfigFrom(__DIR__.'/../config/failed-job-monitor.php', 'failed-job-monitor');

        $this->app->singleton('remote-logging', function ($app) {
            return new RemoteLogging();
        });
    }
}
