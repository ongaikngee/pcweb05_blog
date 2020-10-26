@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container">
                <div class="container">
                    @foreach ($blogs as $blog)

                        <div class="row m-4">
                            <div class="h2"><img width="50" src="storage/{{ $blog->image }}">{{ $blog->name }}</div>
                            <div class="col-12 border border-primary p-4">

                                <div class="h2">{{ $blog->title }}</div>
                                <div class="text-secondary">Posted {{ Carbon\Carbon::parse($blog->b_created)->diffForHumans() }}</div>
                                @if ($user == $blog->user_id)
                                    <div>
                                        <a href="/deleteblog/{{ $blog->id }}"><img width="30"
                                                src="{{ url('/images/delete.png') }}" alt="Delete"></a>
                                        <a href="/updateblog/{{ $blog->id }}"><img width="30"
                                                src="{{ url('/images/edit.png') }}" alt="Edit"></a>
                                    </div>
                                @endif
                                <div class="my-4">{{ $blog->content }}</div>
                                @if ($blog->image != null)
                                    <div><img height="300" src="/{{ $blog->b_image }}"></div>
                                @endif
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
