<?php

namespace Spatie\FailedJobMonitor;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class FailedJobMonitorServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/failed-job-monitor.php' => config_path('failed-job-monitor.php'),
        ], 'config');

        $this->app->make(FailedJobNotifier::class)->register();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/failed-job-monitor.php',
            'failed-job-monitor'
        );

        $this->app->singleton(FailedJobNotifier::class);
    }
}
