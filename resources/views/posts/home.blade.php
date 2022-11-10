@extends('layouts.parent')

@section('title', 'All Posts')


@section('content')

{{-- /////////////////////////////// --}}
<div class="card-group">
    @foreach ($posts as $post)
<div class="card" style="width: 18rem;">
    {{-- <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}"  alt="Card image cap"> --}}
    <div class="card-body">
      <h5 class="card-title">
        <a href="{{route('posts.show',$post->id)}}" class="btn btn-outline-warning">
            {{$post->title}}</a> </h5>
      <p class="card-text" style="width: 100px;">{{$post->body}}</p>
    </div>
</div>
    @endforeach
  </div>
{{-- /////////////////////////////// --}}



@endsection

