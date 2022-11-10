@extends('layouts.parent')


@section('title','Create Post')


@section('content')

    <div class="col-12">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name_en">Title </label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
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
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                    </div>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- ///////////////comment/////////////// --}}
            <div class="form-row">
                <div class="col-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 my-3">
                    <button class="btn btn-primary"> Store </button>
                </div>
            </div>
        </form>
    </div>
@endsection
