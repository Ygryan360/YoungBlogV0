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
                    <x-post-item-card :post="$post" />
                @endforeach
                <div class="mb-4">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    @elseif (isset($results) && $results->count() == 0)
        <h2>Aucun résultat trouvé :- (</h2>
    @endif
@endsection
