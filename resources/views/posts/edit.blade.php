@extends('layouts.parent')


@section('title','Edit Post')


@section('content')

    <div class="col-12">
        <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT');
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name_en">Title </label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                    </div>
                    @error('title')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="details_en">Body</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                    </div>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- ///////////////comment/////////////// --}}
            <div class="form-row">
                <div class="col-12">
                    <div class="col-4  my-3">
                        {{-- <img src="{{asset('images/posts/'.$post->image)}}" class="w-100" alt="old image"> --}}
                        <img src="{{$post->image}}" class="w-100" alt="old image">
                    </div>
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 my-3">
                    <button class="btn btn-warning"> UPDATE </button>
                </div>
            </div>
        </form>
    </div>
@endsection
