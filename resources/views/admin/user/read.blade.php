@extends('layouts.index')

@section('title','Read User')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading d-flex">
                <h3 class="panel-title">User Information</h3>
                <a href="{{url('/dashboard/user')}}" class="btn btn-danger">Back to Users</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <th>{{$user->id}}</th>
                                        <th>{{$user->name}}</th>
                                        <th>{{$user->email}}</th>
                                        <th>{{$user->created_at}}</th>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection