<?php

namespace App\Managers\Feed\Drivers;

use Carbon\Carbon;
use SimpleXMLElement;
use GuzzleHttp\Client;
use App\Managers\Feed\DriverContract;

class EcomixDriver implements DriverContract
{
    /**
     * Config
     *
     * @var array
     */
    protected $config = [];

    public function __construct(array $config, $clientHttp)
    {
        $this->config = $config;
        $this->clientHttp = $clientHttp;
    }

    public function productionsOfTheDay()
    {
        $today = Carbon::now('Europe/Paris')->format('d/m/Y');

        $link = sprintf($this->config['url'], $today, $today);

        return $this->clientHttp->get($link);
    }
}
