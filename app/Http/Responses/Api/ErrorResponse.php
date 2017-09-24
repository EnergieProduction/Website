<?php

namespace App\Http\Responses\Api;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class ErrorResponse extends ApiResponse implements Responsable
{
    public function __construct()
    {

    }

    public function toResponse($request)
    {
    	return $this->response();
    }
}