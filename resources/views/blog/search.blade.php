@php
    $categories = App\Models\Category::take(5)->get();
@endphp
@extends('layouts.blog')
@section('og-description', 'Trouvez des articles de notre blog.')
@section('url', route('blog.posts'))
@section('title', 'Rechercher')
@section('content')
    <h1 class="text-white add-letter-space mb-5">
        Recherche {{ request()->query('search') ? ': ' . request()->query('search') : '' }}
    </h1>
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form class="search-form" action="{{ route('blog.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control bg-transparent shadow-none rounded-0" placeholder="Rechercher..."
                        name="search" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn" type="submit">
                            <span class="fas fa-search"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="my-2">
        Entrez un mot-clé pour rechercher des articles.
    </p>
    @if (isset($results) && $results->count() > 0)
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <h2 class="text-white add-letter-space mb-5">Résultats</h2>
                @foreach ($results as $post)
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
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    @elseif (isset($results) && $results->count() == 0)
        <h2>Aucun résultat trouvé</h2>
    @endif
@endsection
