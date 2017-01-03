<?php

/**
 * Created by PhpStorm.
 * User: ABDULLAH AL SHAKIB
 * Date: 28-12-16
 * Time: 00.43
 */
namespace App\Repositories\Jobs;

use App\Events\SendMailToAdminEvent;
use App\Models\Post;
use App\Models\User;
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
    protected $user;

    /**
     * JobRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveJob($request)
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => $this->_makeSlug($request->get('title')),
            'description' => $request->get('description'),
            'email' => $request->get('email'),
            'user_id' => Auth::user()->id
        ];
        if ($this->_totalJobCountByUserIdAndEmail(Auth::user()->id, $request->get('email')) == 1) {
            $data['status'] = 1;
        }

        if ($saveData = $this->post->insertGetId($data)) {
            if ($this->_totalJobCountByUserIdAndEmail(Auth::user()->id, $request->get('email')) == 1) {
                // send mail for the first job post by a new mail address
                event(new SendMailToHrManager($data)); // mail to hr manager

                // send mail to admin
                $adminUser = $this->_getAdminInfo();
                if (!empty($adminUser)) {
                    $data['approveUrl'] = route('job.approve', [$saveData]);
                    $data['spamUrl'] = route('job.deny', [$saveData]);
                    event(new SendMailToAdminEvent($data, $adminUser));
                }
            }


            return true;
        } else {
            return false;
        }
    }

    protected function _makeSlug($slug)
    {
        $check = $this->post->where('slug', str_slug($slug))->count();
        if (!empty($check)) {
            return str_slug($slug . '-' . $check);
        } else {
            return str_slug($slug);
        }
    }

    protected function _totalJobCountByUserIdAndEmail($userId, $email)
    {
        return $this->post->where('user_id', $userId)->where('email', $email)->count();

    }

    protected function _getAdminInfo()
    {
        return $this->user->adminUser()->first();
    }

    public function getAllJobs()
    {
        $jobs = $this->post->with('user');
        if (Auth::user()->type == 2) {
            // get own posts
            $jobs->userPosts(Auth::user()->id);
        }
        return $jobs->paginate(10);
    }

    public function updateJobStatus($id, $status)
    {
        $job = $this->post->find($id);
        $job->status = $status;
        if($job->save()){
            return TRUE;
        }
        return FALSE;

    }

}