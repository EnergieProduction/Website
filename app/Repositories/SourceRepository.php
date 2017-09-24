<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

class SourceRepository extends BaseRepository implements CacheableInterface {

	use CacheableRepository;

    protected $cacheMinutes = 90;

	protected $cacheOnly = ['name', 'slug_name'];

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Source";
    }
}