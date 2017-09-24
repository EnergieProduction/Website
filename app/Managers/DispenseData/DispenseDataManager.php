<?php

namespace App\Managers\DispenseData;

use Illuminate\Support\Manager;

class DispenseDataManager extends Manager
{
    public function createDatabaseDriver()
    {
        $config = $this->app['config']['dispensedata.drivers.database'];

        $productionRepository = app('App\Repositories\ProductionRepository');

        $transport = new Drivers\DatabaseDriver($config, $productionRepository);

        return $this->repository($transport);
    }

    protected function repository(DriverContract $driver)
    {
        return new Repository($driver);
    }

    public function getDefaultDriver()
    {
        return $this->app['config']['dispensedata.driver'];
    }

    public function setDefaultDriver($name)
    {
        $this->app['config']['dispensedata.driver'] = $name;
    }    
}
