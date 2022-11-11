@extends('layouts.parent')

@section('title', 'Show Post')


@section('content')

<div class="col d-flex justify-content-center">

    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-success">{{$post->title}}</h5>
          <p class="card-text">{{$post->body}}</p>
          <p class="card-text"><small class="text-primary">created at :  {{$post->created_at}}</small></p>
        </div>
        {{-- <img class="card-img-bottom" src="{{asset('images/posts/'.$post->image)}}"  alt="Card image cap"> --}}
        <img class="card-img-bottom" src="{{$post->image}}"  alt="Card image cap">

      <a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-primary">Edit</a>
      <form action="{{route('posts.delete',$post->id)}}" method="post" class="btn btn-outline-danger">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger" >Delete</button>
      </form>
      </div>
  </div>


{{-- <img class="" src="{{asset('images/posts/AB4XijH4nAPjxLjONsRPGzLhLZa6TK66Q3O5o3GO.jpg')}}"  alt="Card image cap"> --}}

@endsection


