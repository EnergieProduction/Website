<?php

namespace App\Http\Responses\Api;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class GetAllSourcesResponse extends ApiResponse implements Responsable
{
	protected $sourcesList;

    public function __construct(Arrayable $sourcesList)
    {
        $this->sourcesList = $sourcesList;
    }

    public function toResponse($request)
    {
    	return $this->success($this->transformDatas(), 200);
    }

    protected function transformDatas()
    {
    	return $this->sourcesList->map(function($source){
    		return $source->only(['name', 'slug_name']) + [
                'installed_power' => $source->installedPowers->where('active', true)->last()->power
            ];
    	})->toArray();
    }
}
