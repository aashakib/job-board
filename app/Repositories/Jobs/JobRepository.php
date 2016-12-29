<?php

/**
 * Created by PhpStorm.
 * User: ABDULLAH AL SHAKIB
 * Date: 28-12-16
 * Time: 00.43
 */
namespace App\Repositories\Jobs;

use App\Models\Post;
use Auth;
use App\Events\SendMailToHrManager;

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
    public function saveJob($request)
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => $this->makeSlug($request->get('title')),
            'description' => $request->get('description'),
            'email' => $request->get('email'),
            'user_id' => Auth::user()->id
        ];
        if ($this->totalJobCountByUserIdAndEmail(Auth::user()->id, $request->get('email')) == 1) {
            $data['status'] = 1;
        }

        if ($this->post->insert($data)) {
            if ($this->totalJobCountByUserIdAndEmail(Auth::user()->id, $request->get('email')) == 1) {
                // send mail for the first job post by a new mail address
                event(new SendMailToHrManager($data)); // mail to hr manager
            }

            // send mail to admin

            return true;
        } else {
            return false;
        }
    }

    public function makeSlug($slug)
    {
        $check = $this->post->where('slug', str_slug($slug))->count();
        if (!empty($check)) {
            return str_slug($slug . '-' . $check);
        } else {
            return str_slug($slug);
        }
    }

    public function totalJobCountByUserIdAndEmail($userId, $email)
    {
        return $this->post->where('user_id', $userId)->where('email', $email)->count();

    }

}