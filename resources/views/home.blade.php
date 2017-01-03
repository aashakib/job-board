@extends('layouts.main-layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">All Jobs</div>
                            <div class="panel-body">
                                {{$statistics['total']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Published</div>
                            <div class="panel-body">
                                {{$statistics['published']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Spam</div>
                            <div class="panel-body">
                                {{$statistics['spam']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
