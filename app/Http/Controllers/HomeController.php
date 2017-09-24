<?php

namespace App\Http\Controllers;

use App\Http\Responses\Web;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function home()
	{
		// var_dump($results);

		$feedManager = app('App\Managers\Feed\DriverContract');

		dd($feedManager->productionsOfTheDay());

		return new Web\HomeResponse();
	}
}

