<?php

namespace App\Managers\DispenseData\Drivers;

use App\Repositories\Criterias;
use Illuminate\Support\Manager;
use App\Repositories\ProductionRepository;
use Illuminate\Contracts\Support\Arrayable;
use App\Managers\DispenseData\DriverContract;

class DatabaseDriver implements DriverContract
{
	public function __construct(array $config, ProductionRepository $productionRepository)
	{
		$this->config = $config;
		$this->productionRepository = $productionRepository;
	}

	public function lastGlobalStats($sourcesList) : array
	{
		$tmp = [];

		$this->productionRepository->pushCriteria(new Criterias\MostRecent);
		$this->productionRepository->pushCriteria(new Criterias\Limit(10));

		foreach ($sourcesList as $source) {

			$tmpProductions = [];

			$productions = $this->productionRepository->findWhere([
				'source_id' => $source->id
			]);

			foreach ($productions as $production) {
				$tmpProductions[] = [
					'power' => $production->power, 
					'installed_power' => $production->installedPower->power, 
					'load_factor' => ($production->power * 100) / $production->installedPower->power,
					'verified' => $production->verified,
				];
			}

			$tmp[] = [
				'source' => [
					'name' => $source->name,
					'slug_name' => $source->slug_name,
				],
				'productions' => $tmpProductions
			];	
		}

		return $tmp;
	}
}
