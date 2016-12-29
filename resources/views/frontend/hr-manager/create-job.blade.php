@extends('layouts.main-layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Job</div>

                <div class="panel-body">
                    @if(Session::has('flash_success'))
                        <div class="alert alert-success"><span
                                    class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                @if(Session::has('flash_error'))
                                    <li>
                                        <span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_error') !!}</em>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('job.save')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="detail">Job Detail</label>
                            <textarea name="description" id="custom-editor" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <button type="submit" class="btn btn-default btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection