@extends('layouts.dashboard')
@section('title', $tag->id ? 'Modifier un tag' : 'Créer un tag')
@section('content')
    <div class="d-flex justify-content-between">
        <h1>@yield('title')</h1>
    </div>
    <form action="{{ $tag->id ? route('tags.update', $tag) : route('tags.store') }}" method="post">
        @csrf
        @method($tag->id ? 'put' : 'post')
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tag->name) }}">
            @error('name')
                <div class="text-danger text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
