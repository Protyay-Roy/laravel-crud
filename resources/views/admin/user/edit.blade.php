@extends('layouts.index')

@section('title', 'Edit User')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit User</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="{{url('dashboard/user/update')}}">
                @csrf
                <input value="{{$user->id}}" name="id" type="hidden">
                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$user->name}}">
                </div>

                <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputRoll">User's Type</label>
                    <select name="roll_id" id="exampleInputRoll">
                        <option value="" disabled selected>Must Select User's Type</option>
                        @foreach($status as $userroll)
                        <option value="{{$userroll->status}}">{{$userroll->name}}</option>
                        @endforeach
                    </select>
                    <span style="margin-left: 20px;"> This User is 
                        @if($user->roll_id == 1 || $user->roll_id == 2)
                            an {{$user->rollId->name}}
                        @else
                            a {{$user->rollId->name}}
                        @endif
                    </span>
                </div>
                <button type="submit" class="btn btn-purple waves-effect waves-light">Update User</button>
            </form>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div>
@endsection