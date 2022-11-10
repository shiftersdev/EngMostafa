<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\HasMedia;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;



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
}
