@extends('layouts.blog')
@section('og-description', 'Découvrez tous les articles de mon blog.')
@section('url', route('blog.posts'))
@section('title', 'Articles')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <h1 class="text-white add-letter-space mb-5">Tous mes articles &rarr;</h1>
            @foreach ($posts as $post)
                <x-post-item-card :post="$post" />
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
