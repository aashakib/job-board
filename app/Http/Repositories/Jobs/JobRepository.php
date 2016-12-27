<?php

/**
 * Created by PhpStorm.
 * User: ABDULLAH AL SHAKIB
 * Date: 28-12-16
 * Time: 00.43
 */
namespace  App\Http\Repositories\Jobs;
use App\Models\Post;

/**
 * Class JobRepository
 * @package App\Http\Repositories\Jobs
 */
class JobRepository implements JobRepositoryContract
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * JobRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveJob($request){
        return $request->all();
    }

}