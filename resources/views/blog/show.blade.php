@extends('layouts.blog')
@section('og-description', \Str::limit($post->content, 150))
@section('url', route('blog.show', [$post->slug, $post->id]))
@section('title', $post->title)
@section('content')
    <div class="row justify-content-between pb-4">
        <div class="col-lg-10">
            <img class="img-fluid" src="{{ $post->cover ?? asset('img/cover.png') }}" alt="{{ $post->title }}">
            <h1 class="text-white add-letter-space mt-4">@yield('title')</h1>
            <ul class="post-meta mt-3">
                <li class="d-inline-block mr-3">
                    <span class="fas fa-clock text-primary"></span>
                    <span class="ml-1 text-white">
                        {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                    </span>
                </li>
                <li class="d-inline-block">
                    <span class="fas fa-list-alt text-primary"></span>
                    <a class="ml-1" href="{{ route('blog.category', $post->category->slug) }}">
                        {{ ucfirst($post->category->name) }}
                    </a>
                </li>
            </ul>
            <div class="mt-3 mb-5">
                {!! $post->content !!}
            </div>
            <div class="l-0 mt-4 mb-4">
                <div class="categores-links text-capitalize">
                    <h3 class="text-white add-letter-space mb-2">
                        <span class="fas fa-tags text-primary"></span>
                        Libellés :
                    </h3>
                    @foreach ($post->tags as $tag)
                        <a class="border" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="mb-5">
                <h3 class="text-white add-letter-space mb-2">
                    <span class="fas fa-comment text-primary"></span>
                    Commentaires :
                </h3>
                <div class="my-3 comment-form">
                    <form method="POST" action="{{ route('blog.comment', $post->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="name" class="text-black-300">Votre nom</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                        value="{{ old('name') }}" placeholder="John Doe" required>
                                    @error('name')
                                        <div class="text-sm text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="email" class="text-black-300">Addresse E-Mail</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                        value="{{ old('email') }}" placeholder="john.doe@exemple.com" required>
                                    @error('email')
                                        <div class="text-sm text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-5">
                                    <label for="content" class="text-black-300">Votre Commentaire</label>
                                    <textarea name="content" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                        placeholder="Ecrivez ici..." required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="text-sm text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <small>Attention: Une fois le commentaire envoyé, il est impossible de le supprimer ou
                                    de le modifier. Faites attentin à ce que vous postez !
                                </small> <br />
                                <button type="submit" class="btn btn-sm btn-primary mt-2">
                                    Poster <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="comments">
                <h4 class="text-white add-letter-space mb-2">
                    <span class="fas fa-comments text-primary"></span>
                    Commentaires :
                </h4>
                <div class="comments-container">
                    @foreach ($post->comments as $comment)
                        <div class="comment-item">
                            <h5 class="add-letter-space mb-1">{{ $comment->name }}</h5>
                            <p>
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
