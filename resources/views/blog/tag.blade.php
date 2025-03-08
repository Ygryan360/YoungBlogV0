@extends('layouts.blog')
@section('url', route('blog.tag', $tag->slug))
@section('title', 'Tag: ' . ucfirst($tag->name))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="bg-dark p-5 mb-5">
                <h1 class="text-white add-letter-space">{{ ucfirst($tag->name) }}</h1>
                <div class="breadcrumb-wrap mt-3">
                    <a href="{{ route('blog.home') }}">Tags</a>
                    <span>/</span>
                    <span>{{ ucfirst($tag->name) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-lg-7">
            @foreach ($posts as $post)
                <x-post-item-card :post="$post" />
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
