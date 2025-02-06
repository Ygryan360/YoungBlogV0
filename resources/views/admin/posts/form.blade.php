@php
    $categories = App\Models\Category::select(['id', 'name'])->get();
    $tags = App\Models\Tag::select(['id', 'name'])->get();
    $postTags = $post->tags->pluck('id');
@endphp
@extends('layouts.dashboard')

@section('title', $post->id ? 'Modifier un article' : 'Créer un article')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.2/dist/css/tom-select.css" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <h1>@yield('title')</h1>
    </div>
    <form action="{{ $post->id ? route('posts.update', $post) : route('posts.store') }}" method="post">
        @csrf
        @method($post->id ? 'put' : 'post')
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" autofocus
                value="{{ old('title', $post->title) }}" required>
            @error('title')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Selectionner une Catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category_id', $post->category_id))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select name="tags[]" id="tags" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags') ?? []) || $postTags->contains($tag->id))>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Image</label>
            <input type="url" class="form-control" id="cover" name="cover"
                value="{{ old('cover', $post->cover) }}">
            @error('cover')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        let simplemde = new SimpleMDE({
            element: document.getElementById("content"),
            spellChecker: false,
            toolbar: ["bold", "italic", "heading", "link", "|", "quote", "unordered-list", "ordered-list", "|",
                "preview"
            ],
        });
        let tssettings = {
            placeholder: 'Selectionner un ou plusieurs tags',
            required: true,
        };
        new TomSelect('#tags', tssettings);
    </script>
@endsection
