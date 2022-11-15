@extends('layouts.index')

@section('title','Add Post')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Post</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="{{url ('/dashboard/post')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group {{$errors->has('title') ? 'has-error' : '' }}">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Post Name">
                            @if($errors->has('title'))
                                <span class="required-info">
                                    <strong style="color:red; margin-left:15px">{{$errors->first('title')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('desc') ? 'has-error' : '' }}">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="desc" id="inputEmail3" placeholder="Post Description">
                            @if($errors->has('desc'))
                                <span class="required-info">
                                    <strong style="color:red; margin-left:15px">{{$errors->first('desc')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="img" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Add New Post</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div> 
    </div> 

</div>


@endsection
