<?php

namespace App\Services\Charts;

class Builder
{
	protected $config;

	public function __construct($config)
	{
		$this->config();
	}

	public function create(Chart $chart, $params = [])
	{
		return $chart->handle($params);
	}
}
