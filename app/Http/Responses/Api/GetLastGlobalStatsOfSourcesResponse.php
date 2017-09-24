<?php

namespace App\Http\Responses\Api;

use App\Managers\DispenseData\Response;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class GetLastGlobalStatsOfSourcesResponse extends ApiResponse implements Responsable
{
	protected $reponse;

    public function __construct(Response $reponse)
    {
    	$this->reponse = $reponse;
    }

    public function toResponse($request)
    {
    	return $this->success($this->reponse->getDatas());
    }
}