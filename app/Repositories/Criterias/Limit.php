<?php

namespace App\Repositories\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class Limit
 * @package namespace App\Repositories\Video\Criteria;
 */
class Limit implements CriteriaInterface
{
    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->limit($this->limit);

        return $model;
    }
}
