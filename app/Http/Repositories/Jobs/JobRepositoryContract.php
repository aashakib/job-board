<?php

/**
 * Created by PhpStorm.
 * User: ABDULLAH AL SHAKIB
 * Date: 28-12-16
 * Time: 00.42
 */
namespace  App\Http\Repositories\Jobs;

/**
 * Interface JobRepositoryContract
 * @package App\Http\Repositories\Jobs
 */
interface JobRepositoryContract
{

    /**
     * @param $request
     * @return mixed
     */
    public function saveJob($request);

}