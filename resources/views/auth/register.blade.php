@extends('auth.layouts.base')
@section('title', 'Register')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">S'inscrire</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="nom@example.com">
            <label for="name">Nom</label>
            @error('name')
                <div class="text-sm text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="nom@example.com">
            <label for="username">Nom d'utilisateur</label>
            @error('username')
                <div class="text-sm text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="nom@example.com">
            <label for="email">E-Mail</label>
            @error('email')
                <div class="text-sm text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de Passe">
            <label for="password">Mot de passe</label>
            @error('password')
                <div class="text-sm text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                placeholder="Confirmer le mot de Passe">
            <label for="password_confirmation">Confirmation</label>
        </div>
        <a class="" href="{{ route('login') }}">
            Déjà inscrit ?
        </a>
        <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; {{ date('Y') }}</p>
    </form>
@endsection
