<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\HasMedia;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;



class PostController extends Controller
{
    public function index()
    {
         $posts = Post::all();
        //  return view('posts.index',compact('posts'));
         return view('posts.home',compact('posts'));
    }

    public function create()
    {
         return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {

         $imageName = HasMedia::upload($request->file('image'),public_path('images\posts'));
         $data = $request->except('_token','image');
         $data['image'] = $imageName;
         Post::create($data);
         return redirect()->route('posts.index')->with('success','Post is Created Successfully');
    }

    public function show($id)
    {
         $post = Post::findOrFail($id);

         return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
         $post = Post::findOrFail($id);
         return view('posts.edit',compact('post'));
    }

    public function update(UpdatePostRequest $request,$id)
   {
        $post = Post::findOrFail($id); // select
        $data = $request->except('_token','image','_method');
        // if request has image => upload new image , delete old image
        if($request->hasFile('image')){
            $imageName = HasMedia::upload($request->file('image'),public_path('images\posts'));
            $del_image=substr($post->image , 35);
            HasMedia::delete(public_path("images\posts\\{$del_image}"));
            $data['image'] = $imageName;
        }

        $post->update($data);
        // update data into db
        return redirect()->route('posts.index')->with('success','Post Updated Successfully');
   }

   public function delete($id)
   {
        $post = Post::findOrFail($id); // select
        // HasMedia::delete(public_path("images\posts\\{$post->image}"));
        $del_image=substr($post->image , 35);
        HasMedia::delete(public_path("images\posts\\{$del_image}"));
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post Deleted Successfully');

   }
}
