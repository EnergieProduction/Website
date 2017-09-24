<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
	Route::get('get-source', ['uses' => 'ApiController@getSource'])->name('getSource');
	Route::get('get-all-sources', ['uses' => 'ApiController@getAllSources'])->name('getAllSources');
	Route::get('get-last-global-stats-of-sources', ['uses' => 'ApiController@getLastGlobalStatsOfSources'])->name('getLastGlobalStatsOfSources');
	Route::get('get-source-stats', ['uses' => 'ApiController@getSourceStats'])->name('getSourceStats');
});

