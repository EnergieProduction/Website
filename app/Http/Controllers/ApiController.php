<?php

namespace App\Http\Controllers;

use App\Http\Responses\Api;
use Illuminate\Http\Request;
use App\Services\SourceService;
use App\Managers\DispenseData\DispenseDataManager;
use App\Http\Requests\FindSourceBySlugNameRequest;

class ApiController extends Controller
{
	public function getSource(FindSourceBySlugNameRequest $request)
	{
		$source = app(SourceService::class)->findBySlugName($request->get('slug_name'));

		return new Api\GetSourcesResponse($source);
	}	

	public function getAllSources(Request $request)
	{
		$sourcesList = app(SourceService::class)->getAllSources();

		return new Api\GetSourcesResponse($sourcesList);
	}

	public function getLastGlobalStatsOfSources(Request $request)
	{
		$sourcesList = app(SourceService::class)->getAllSources();

		$response = app(DispenseDataManager::class)->lastGlobalStats($sourcesList);

		return new Api\BasicResponse($response->getDatas());
	}
}
