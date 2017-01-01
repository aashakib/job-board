@extends('layouts.main-layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Jobs</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Slug</td>
                                <td>Email</td>
                                <td>Status</td>
                                @if(Auth::user()->type == 1)
                                    <td>Posted By</td>
                                    <td>Action</td>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($allJobs))
                                @foreach($allJobs as $job)
                                    <tr>
                                        <td>{{$job->title}}</td>
                                        <td>{{$job->slug}}</td>
                                        <td>{{$job->email}}</td>
                                        <td>
                                            <span class="label
                                            @if($job->status == 'pending')
                                                    label-default
                                            @elseif($job->status == 'published')
                                                    label-primary
                                            @else
                                            label-danger
                                            @endif
                                            ">
                                                {{$job->status}}
                                            </span>
                                        </td>
                                        @if(Auth::user()->type == 1)
                                            <td>{{$job->user->name}}</td>
                                            <td><a href="{{route('job.approve', [$job->id])}}">Publish</a> | <a href="{{route('job.deny', [$job->id])}}">Spam</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $allJobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection