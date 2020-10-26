@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            {{-- <div class="row justify-content-center bg-warning p-3 rounded">
                <div class="col-md-3">
                    <img class="rounded-circle" width="150" src="/storage/{{ $profile->image }}">
                </div>
                <div class="col-md-9">
                    <h3>{{ $user->name }}</h3>
                    <span><strong>0</strong> posts</span>
                    <div class="pt-3">{{ $profile->description }}</div>
                </div>
            </div> --}}




            {{-- Adding more blog. --}}
            <br>
            <div class="row">
                <div class="h2">Enter your new blog.</div>
                <div class="col-12  p-3">

                    <form action="{{ route('blog.createBlog') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group row">
                            <input  class="form-control" type="text" name="title" placeholder="Title of blog"><br>
                        </div>
                        <div class="form-group row">
                            <textarea  class="form-control" rows="5" cols="80" name="content" placeholder="What are your thought?"></textarea><br>
                        </div>
                        <div class="form-group row">
                            <label for="blogpic">Insert picture</label>
                        {{-- </div>
                        <div class="form-group row"> --}}
                            <input  class="form-control" type="file" name="blogpic" id="blogpic">
                        </div>
                    

                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Blog this entry.</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
