<?php

namespace App\Http\Responses\Api;

use Carbon\Carbon;

abstract class ApiResponse
{
    public function success(array $data = [])
    {
    	return $this->response(['datas' => $data], 200);
    }

    public function fail(array $data = [], $code = 500)
    {
    	return $this->response(['errors' => $data], $code);    	
    }

    protected function response(array $data = [], $code = 200)
    {	
    	return response()->json(['timestamp' => Carbon::now()->timestamp] + $data, $code);
    }        
}