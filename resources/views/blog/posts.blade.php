@extends('layouts.blog')
@section('og-description', 'Découvrez tous les articles de notre blog.')
@section('url', route('blog.posts'))
@section('title', 'Articles')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <h1 class="text-white add-letter-space mb-5">Tous nos articles &rarr;</h1>
            @foreach ($posts as $post)
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{ route('blog.show', [$post->slug, $post->id]) }}">
                        {{-- $post->cover ?? --}}
                        <img class="card-img-top rounded-0" src="{{ asset('img/cover.png') }}" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover"
                                href="{{ route('blog.show', [$post->slug, $post->id]) }}">
                                {{ \Str::limit(ucfirst($post->title), 35) }}
                            </a>
                        </h2>
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
                                    {{ ucfirst($post->category->name) }}
                                </a>
                            </li>
                        </ul>
                        <p class="card-text my-4">
                            {{ \Str::limit($post->content, 100) }}
                        </p>
                        <a href="{{ route('blog.show', [$post->slug, $post->id]) }}" class="btn btn-primary">
                            Lire &rarr;
                        </a>
                    </div>

                </div>
            @endforeach

            <div class="mb-4">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget bg-dark p-4 text-center">
                <x-widget-newsletter />
            </div>
        </div>
    </div>
@endsection
