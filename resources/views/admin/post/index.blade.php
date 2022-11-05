@extends('layouts.index')

@section('title', 'All Posts')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading d-flex">
                <h3 class="panel-title">All Post Information</h3>
                <a href="{{url('dashboard/post/create')}}" class="btn btn-primary">Add New Post</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(session('msg'))
                            <h4>{{session('msg')}}</h4>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($posts as $data)
                                    <tr>
                                        <th>{{$data->id}}</th>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->desc}}</td>
                                        <td>
                                            <img src="{{url('storage/post_images')}}/{{$data->img}}" alt="{{$data->img}}" style="height:50px;">
                                        </td>
                                        <!-- <th>
                                            <a href="{{url('/dashboard/post/create')}}">
                                                <i class="md md-add"></i>
                                            </a>
                                            <a href="{{url('dashboard/post/'.$data->id.'/edit')}}">
                                                <i class="md-mode-edit"></i>
                                            </a>
                                            <a href="{{url('dashboard/post/{post}'.$data->id)}}">
                                                <i class="md-delete"></i>
                                            </a>
                                        </th> -->
                                        <th>
                                            <a href="{{url('/dashboard/post/'.$data->id.'/edit/')}}" class="btn btn-success">
                                                Edit
                                            </a>
                                        </th>
                                        <th>
                                            <form action="{{url('/dashboard/post/'.$data->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                    @endforeach
                                    
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