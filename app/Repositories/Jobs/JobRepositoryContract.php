<?php

/**
 * Created by PhpStorm.
 * User: ABDULLAH AL SHAKIB
 * Date: 28-12-16
 * Time: 00.42
 */
namespace  App\Repositories\Jobs;

/**
 * Interface JobRepositoryContract
 * @package App\Repositories\Jobs
 */
interface JobRepositoryContract
{

    public function saveJob($request);
    public function makeSlug($slug);
    public function totalJobCountByUserIdAndEmail($userId, $email);

}