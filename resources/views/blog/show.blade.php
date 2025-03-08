@extends('layouts.blog')
@section('og-description', \Str::limit($post->content, 150))
@section('url', route('blog.show', [$post->slug, $post->id]))
@section('title', $post->title)
@section('content')
    <div class="row justify-content-between pb-4">
        <div class="col-lg-10">
            <img class="img-fluid" src="{{ $post->cover ?? asset('img/cover.png') }}" alt="{{ $post->title }}">
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
                    <a class="ml-1" href="{{ route('blog.category', $post->category->slug) }}">
                        {{ ucfirst($post->category->name) }}
                    </a>
                </li>
            </ul>
            <div class="mt-3 mb-5">
                {!! $post->content !!}
            </div>
            <div class="l-0 mt-4 mb-4">
                <div class="categores-links text-capitalize">
                    <h3 class="text-white add-letter-space mb-2">
                        <span class="fas fa-tags text-primary"></span>
                        Libellés :
                    </h3>
                    @foreach ($post->tags as $tag)
                        <a class="border" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
