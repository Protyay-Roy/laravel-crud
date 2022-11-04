<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRoll;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {

        $users = User::all();

        return view('admin.user.all', compact('users'));
    }

    public function add()
    {
        return view('admin.user.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ], [
            'name.required' => 'Please Insert a Valid Name',
        ]);
        if($request->hasFile('img'))
        {
            $img = $request->File('img');
            $imgName = Time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('storage/user_images'),$imgName);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->img = $imgName;
        if($request->password == $request->repass)
        {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect("dashboard/user");
        } else
        {
            return redirect()->back()->with('msg','Your Comfirm Password does not match');
        }
        
    }
    public function read($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.read', compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $status = UserRoll::all();
        return view('admin.user.edit', compact('user', 'status'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'name.required' => 'Please Insert a Valid Name',
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->roll_id = $request->roll_id;
        $update = $user->save();
        if ($update) {
            return redirect("dashboard/user");
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $oldImg = "storage/user_images/".$user->img;
        if(File::exists($oldImg))
        {
            File::delete($oldImg);
        }
        $user->delete();
        return redirect("dashboard/user");
    }

    public function readImg($id)
    {
        $userImg = User::where('id',$id)->first();
        return view('admin.user.edit_img',compact('userImg'));

    }

    public function editImg(Request $req)
    {
        $userImg = User::find($req->id);

        if($req->hasFile('img'))
        {
            $oldImg = "storage/user_images/".$userImg->img;
            if(File::exists($oldImg))
            {
                File::delete($oldImg);
            }
            $img = $req->File('img');
            $imgName = date('YmdHi').'.'.$img->getClientOriginalExtension();
            $img->move(public_path('storage/user_images'),$imgName);
        }else
        {
            $imgName = $userImg->img;
        }
        $userImg->img = $imgName;
        $update = $userImg->save();
        if($update)
        {
            return redirect('/dashboard');
        }
    }
}
