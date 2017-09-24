<?php

namespace App\Managers\DispenseData;

class Repository
{
    protected $driver;

    public function __construct(DriverContract $driver)
    {
        $this->driver = $driver;
    }

	public function lastGlobalStats($sourcesList) :Response
	{
		$stats = $this->driver->lastGlobalStats($sourcesList);

		return new Response($stats);
	}
}
