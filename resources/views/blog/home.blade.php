@extends('layouts.blog')
@section('og-description', 'Découvrez les derniers articles de notre blog et restez informé des dernières actualités.')
@section('url', route('blog.home'))
@section('title', 'Accueil')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <h1 class="text-white add-letter-space mb-5">À la une &rarr;</h1>
            @foreach ($posts as $post)
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{ route('blog.show', [$post->slug, $post->id]) }}">
                        <img class="card-img-top rounded-0" src="{{ $post->cover ?? asset('img/cover.png') }}"
                            alt="{{ $post->title }}">
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
            <div class="mb-5 text-center">
                <a href="{{ route('blog.posts') }}" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget text-center">
                <x-widget-author />
            </div>
            <div class="widget bg-dark p-4 text-center">
                <x-widget-newsletter />
            </div>

            <div class="widget">
                <x-widget-last-posts />
            </div>
            <!-- end of post-items widget -->
        </div>
    </div>
@endsection
