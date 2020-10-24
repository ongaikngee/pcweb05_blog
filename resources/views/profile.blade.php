@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img class="rounded-circle" width="150" src="/storage/{{ $profile->image }}">
                </div>
                <div class="col-md-9">
                    <h3>{{ $user->name }}</h3>
                    <span><strong>{{ $numBlogs }}</strong> posts</span>
                    <div class="pt-3">{{ $profile->description }}</div>
                </div>
            </div>




            {{-- <div class="row">
                <div class="col-4">
                    <div class="h3"><a href="/blog">Click here for new Blog</a></div>
                </div>
                <div class="col-4">
                    <div class="h3">Add something here</div>
                </div>
                <div class="col-4">
                    <div class="h3">Add something here</div>
                </div>
            </div> --}}
            <hr>
            <br>

            <div class="row justify-content-center">
                <h1>Your posts</h1>
            </div>

            @foreach ($blogs as $blog)

                <div class="row m-4">
                    <div class="col-12 border border-primary p-4">
                        <div class="h2">{{ $blog->title }}</div>
                        <div class="text-secondary">Posted {{ $blog->created_at->diffForHumans() }}</div>
                        <div>
                            <a href="/deleteblog/{{ $blog->id }}"><img width="30" src="{{ url('/images/delete.png') }}" alt="Delete"></a>
                            <a href="/updateblog/{{ $blog->id }}"><img width="30" src="{{ url('/images/edit.png') }}" alt="Edit"></a>
                        </div>
                        <div class="my-4">{{ $blog->content }}</div>
                        @if ($blog->image != null)
                            <div><img height="200" src="Storage/{{ $blog->image }}"></div>
                        @endif
                        {{-- <div><a href="/updateblog">Update Blog</a></div>
                        --}}
                    </div>
                </div>

            @endforeach



        </div>
    </div>
@endsection
