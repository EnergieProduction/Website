<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class HomeResponse implements Responsable
{
    public function __construct()
    {
        //
    }

    public function toResponse($request)
    {
        return view('pages.home');
    }
}