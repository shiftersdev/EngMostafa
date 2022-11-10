@extends('layouts.parent')

@section('title', 'All Posts')

{{-- @section('css')
<style>
.fifteen-chars {
    width: 50ch;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
</style>
@endsection --}}

@section('content')

<div class="card-group">
    @foreach ($posts as $post)
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        <a href="{{route('posts.show',$post->id)}}" >
            {{$post->title}}
        </a> </h5>
      <p class="card-text"  style="
      display:inline-block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 20ch;">{{$post->body}}</p>
    </div>
</div>
    @endforeach
  </div>



@endsection

