<?php

namespace App\Managers\Feed;

use Illuminate\Support\Manager;

class FeedManager extends Manager
{
    public function createEcomixDriver()
    {
        $config = $this->app['config']['feed.drivers.ecomix'];

        $transport = new Drivers\EcomixDriver($config, new ClientHttp);

        return $this->repository($transport);
    }

    protected function repository(DriverContract $driver)
    {
        return new Repository($driver);
    }

    public function getDefaultDriver()
    {
        return $this->app['config']['feed.driver'];
    }

    public function setDefaultDriver($name)
    {
        $this->app['config']['feed.driver'] = $name;
    }    
}
