@extends('layouts.dashboard')
@section('title', $category->id ? 'Modifier une catégorie' : 'Créer une catégorie')
@section('content')
    <div class="d-flex justify-content-between">
        <h1>@yield('title')</h1>
    </div>
    <form action="{{ $category->id ? route('categories.update', $category) : route('categories.store') }}" method="post">
        @csrf
        @method($category->id ? 'put' : 'post')
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" required name="name"
                value="{{ old('name') ?? ($category->name ?? '') }}">
            @error('name')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
