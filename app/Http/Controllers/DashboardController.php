<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use Illuminate\Http\Request;
use App\Repositories\Jobs\JobRepositoryContract;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{

    /**
     * @var JobRepositoryContract
     */
    protected $jobRepositoryContract;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JobRepositoryContract $jobRepositoryContract)
    {
        $this->middleware('auth');

        $this->jobRepositoryContract = $jobRepositoryContract;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addJob()
    {
        return view('frontend.hr-manager.create-job');
    }

    /**
     * @param CreateJobRequest $request
     * @return mixed
     */
    public function saveJob(CreateJobRequest $request)
    {
        $response = $this->jobRepositoryContract->saveJob($request);

        if ($response) {
            \Session::flash('flash_success', 'Job successfully created. Now Its under moderation');
            return redirect()->route('job.create');
        } else {
            \Session::flash('flash_error', 'Error in job creation! Please try again');
            return redirect()->route('job.list');
        }
    }

    public function jobLists()
    {
        return view('frontend.hr-manager.job-lists');
    }

    public function jobApprove()
    {

    }

    public function jobDeny()
    {

    }
}