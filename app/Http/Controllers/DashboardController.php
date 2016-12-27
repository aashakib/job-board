<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function addJob(){
        return view('frontend.hr-manager.create-job');
    }

    public function saveJob(CreateJobRequest $request){
        dd($request->all());
    }
}