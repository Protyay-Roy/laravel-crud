@extends('layouts.index')

@section('title','Edit Post')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Post</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="{{url ('dashboard/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="desc" id="inputEmail3" value="{{$post->desc}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Post Image</label>
                        <div class="col-sm-9">
                            <img src="{{url('storage/post_images/'.$post->img)}}" alt="{{$post->img}}" style="height: 100px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Edit Post Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="img" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Update Post</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div> 
    </div> 

</div>


@endsection
