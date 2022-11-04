<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('post');
    }

    public function index()
    {
        $posts = Post::paginate(9);
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file-> move(public_path('storage/post_images'), $filename);
        }
 
        $post->title = $request->input('title');
        $post['desc'] = $request->desc;
        $post['img'] = $filename;
        $post->save();
        return redirect('/dashboard/post');
       
    }

    public function show(Post $post)
    {
        return view('admin.post.edit', compact('post')); 
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        if($request->hasFile('img'))
        {
            $oldImg = "storage/post_images/".$post->img;
            if(File::exists($oldImg))
            {
                File::delete($oldImg);
            }
            $img = $request->File('img');
            $imgName = Time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('storage/post_images'),$imgName);
        }else
        {
            $imgName = $post->img;
        }
        
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->img = $imgName;
        $update = $post->save();
        if($update)
        {
            return redirect('/dashboard/post');
        }
    }

    public function destroy(Post $post)
    {
        $oldImg = "storage/post_images/".$post->img;
        if(File::exists($oldImg))
        {
            File::delete($oldImg);
        }    
       $post->delete();
       return redirect()->back()->with("msg","Your Post Has Been Deleted");
    }
}
