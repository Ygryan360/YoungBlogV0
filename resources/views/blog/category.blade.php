@extends('layouts.blog')
@section('og-description', $category->description)
@section('url', route('blog.category', $category->name))
@section('title', 'Categorie: ' . ucfirst($category->name))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="bg-dark p-5 mb-5">
                <div class="row no-gutters">
                    <div class="col-xl-6 border-right border-lg-0 pr-0 pr-xl-5">
                        <h1 class="text-white add-letter-space">{{ ucfirst($category->name) }}</h1>
                        <p class="mb-3 font-italic">
                            {{ $category->description }}
                        </p>
                        <div class="breadcrumb-wrap mt-3">
                            <a href="{{ route('blog.home') }}">Accueil</a>
                            <span>/</span>
                            <span>{{ ucfirst($category->name) }}</span>
                        </div>
                    </div>
                    <div class="col-xl-6 pl-0 pl-xl-5 mt-4 mt-xl-0">
                        <div class="categores-links text-capitalize">
                            <h3 class="text-white add-letter-space mb-3">Voir plus de categories :</h3>
                            @foreach ($moreCategories as $moreCategory)
                                <a class="border"
                                    href="{{ route('blog.category', $moreCategory->name) }}">{{ $moreCategory->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-lg-7">
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
            {{ $posts->links() }}
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget bg-dark p-4 text-center">
                <x-widget-newsletter />
            </div>
        </div>
    </div>
@endsection
