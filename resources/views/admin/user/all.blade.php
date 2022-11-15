@extends('layouts.index')

@section('title','All Users')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading d-flex">
                <h3 class="panel-title">All User Information</h3>
                <a href="{{url('/dashboard/user/add')}}" class="btn btn-primary">Add New User</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            @if(Auth::user()->roll_id == 1)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Image</th>
                                        <th>Time</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{ucwords($data->name)}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->rollId->name}}</td>
                                        <td>
                                            <img src="{{url('storage/user_images/'.$data->img)}}" alt="$data->img" style="height: 50px;">
                                        </td>
                                        <td>{{$data->updated_at->format("D-M-Y h:i:s a")}}</td>
                                        <th class="crud-icons">
                                            <a href="{{url('dashboard/user/read/' . $data->id)}}"><i class="md md-add"></i></a>
                                            <a href="{{url('dashboard/user/edit/' . $data->id)}}"><i class="md-mode-edit"></i></a>
                                            <a href="{{url('dashboard/user/delete/' . $data->id)}}"><i class="md-delete"></i></a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Image</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $data)
                                    <tr>

                                        <td>{{$data->id}}</td>
                                        <td>{{ucwords($data->name)}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->rollId->name}}</td>
                                        <td>
                                            <img src="{{url('storage/user_images/'.$data->img)}}" alt="$data->img" style="height: 50px;">
                                        </td>
                                        <td>{{$data->updated_at->format("D-M-Y h:i:s a")}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection