<?php

namespace SevenLab\RemoteLogging;

use Exception;
use Illuminate\Support\ServiceProvider;

class RemoteLoggingServiceProvider extends ServiceProvider
{
    /**
     * Abstract type to bind Sentry as in the Service Container.
     *
     * @var string
     */
    public static $abstract = 'remote-logging';

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/remote-logging.php' => config_path('remote-logging.php'),
            __DIR__ . '../config/failed-job-monitor.php' => config_path('failed-job-monitor.php'),
        ], 'config');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(static::$abstract . '.config', function ($app) {
            // Make sure we don't crash when we did not publish the config file and the config is null
            return $app['config'][static::$abstract] ?: array();
        });

        $this->app->singleton(static::$abstract, function ($app) {
            $user_config = $app[static::$abstract . '.config'];

            $client = new RemoteLogging($user_config);

            return $client;
        });

        $app = $this->app;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(static::$abstract);
    }
}
