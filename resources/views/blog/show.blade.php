@extends('layouts.blog')
@section('title', $post->title)
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-10">
            <img class="img-fluid" src="{{ $post->cover ?? asset('img/cover.png') }}" alt="">
            <h1 class="text-white add-letter-space mt-4">@yield('title')</h1>
            <ul class="post-meta mt-3">
                <li class="d-inline-block mr-3">
                    <span class="fas fa-clock text-primary"></span>
                    <span class="ml-1 text-white">
                        {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                    </span>
                </li>
                <li class="d-inline-block">
                    <span class="fas fa-list-alt text-primary"></span>
                    <a class="ml-1" href="{{ route('blog.category', $post->category->name) }}">
                        {{ $post->category->name }}
                    </a>
                </li>
            </ul>
            <div>
                {!! $post->content !!}
            </div>
        </div>
    </div>
@endsection
