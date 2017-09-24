<?php

namespace App\Services;

use App\Repositories\SourceRepository;

class SourceService
{
	public function __construct(SourceRepository $sourceRepository)
	{
		$this->sourceRepository = $sourceRepository;
	}

	public function findBySlugName(string $slugName)
	{
		return $this->sourceRepository->with('installedPowers')->findWhere([
			'slug_name' => $slugName
		])->first();
	}

	public function getAllSources()
	{
		return $this->sourceRepository->with('installedPowers')->all();
	}	
}
