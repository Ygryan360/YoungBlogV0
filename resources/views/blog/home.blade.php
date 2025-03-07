@extends('layouts.blog')
@section('og-description', 'Découvrez les derniers articles de notre blog et restez informé des dernières actualités.')
@section('url', route('blog.home'))
@section('title', 'Accueil')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <h1 class="text-white add-letter-space mb-5">À la une &rarr;</h1>
            @foreach ($posts as $post)
                <x-post-item-card :post="$post" />
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
