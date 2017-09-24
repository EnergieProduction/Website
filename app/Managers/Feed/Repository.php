<?php

namespace App\Managers\Feed;

class Repository
{
    protected $driver;

    public function __construct(DriverContract $driver)
    {
        $this->driver = $driver;
    }

    public function productionsOfTheDay()
    {
    	return $this->driver->productionsOfTheDay();
    }
}
