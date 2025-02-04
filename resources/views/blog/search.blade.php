@extends('layouts.blog')
@section('og-description', 'Trouvez des articles de notre blog.')
@section('url', route('blog.posts'))
@section('title', 'Rechercher')
@section('content')
    <h1 class="text-white add-letter-space mb-5">Recherche</h1>
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
@endsection
