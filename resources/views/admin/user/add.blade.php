@extends('layouts.index')

@section('title','Add User')

@section('content')


<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add New User</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="{{url('dashboard/user/store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Your Name">
                    @if($errors->has('name'))
                    <span class="required-info text-danger" style="margin-left:15px;">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email">
                    @if($errors->has('email'))
                    <span class="required-info text-danger" style="margin-left:15px;">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="exampleInputEmail1">Your Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Password">
                    @if($errors->has('password'))
                    <span class="required-info text-danger" style="margin-left:15px;">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('repass') ? 'has-error' : ''}}">
                    <label for="exampleInputRepass">Retype Password</label>
                    <input type="password" name="repass" class="form-control" id="exampleInputRepass" placeholder="Retype Your Password">
                    @if(session('msg'))
                    <span class="required-info text-danger" style="margin-left:15px;">
                        <strong>{{session('msg')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputImg">Profile Image</label>
                    <input type="file" name="img" class="form-control" id="exampleInputImg">
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light">Add New User</button>
            </form>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div>


@endsection