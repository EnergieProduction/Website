<?php

namespace App\Http\Responses\Api;

use App\Managers\DispenseData\Response;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class BasicResponse extends ApiResponse implements Responsable
{
	protected $datas;

    public function __construct(array $datas)
    {
    	$this->datas = $datas;
    }

    public function toResponse($request)
    {
    	return $this->success($this->datas);
    }
}