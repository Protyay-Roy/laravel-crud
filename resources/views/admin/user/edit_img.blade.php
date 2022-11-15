@extends('layouts.index')

@section('title','Edit Image')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading d-flex">
                <a href="{{url('/dashboard')}}" class="btn btn-danger">Back to Dashboard</a>
                <hr>
                <h3 class="panel-title">Change Profile Picture</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th style="line-height: 100px;">
                                            {{ucwords($userImg->name)}}
                                        </th>
                                        <th>
                                            <img class="img-responsive" style="height: 100px;" src="{{url('storage/user_images/'.$userImg->img)}}" alt="$userImg->img">
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <form method="post" action="{{url('/dashboard/edit_image/update')}}" enctype="multipart/form-data">
                            @csrf
                            <input value="{{$userImg->id}}" name="id" type="hidden">
                            <div class="form-group">
                                <label for="exampleInputImg">Upload Image</label>
                                <input type="file" name="img" class="form-control" id="exampleInputImg">
                            </div>
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update Image</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection