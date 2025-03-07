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
