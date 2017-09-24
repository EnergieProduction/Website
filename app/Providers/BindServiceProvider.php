<?php namespace App\Providers;

use App\Managers\Feed;
use App\Managers\DispenseData\DispenseDataManager;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Feed\DriverContract::class, function($app) {
            return (new Feed\FeedManager($app))->driver();
        });

        $this->app->bind(DispenseDataManager::class, function($app) {
            return (new DispenseDataManager($app))->driver();
        });

        $this->app->bind('Services\ProcessingDatas', function($app) {
            return new \App\Services\ProcessingDatas\Test;
        });        
    }
}