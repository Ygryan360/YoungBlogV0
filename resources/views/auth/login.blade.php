@extends('auth.layouts.base')
@section('title', 'Connexion')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Connexion</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="nom@example.com">
            <label for="email">E-Mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de Passe">
            <label for="password">Mot de passe</label>
        </div>
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="remember" name="remember">
            <label class="form-check-label" for="remember">
                Se souvenir de moi
            </label>
        </div>
        <a class="" href="{{ route('password.request') }}">
            Mot de Passe oublié ?
        </a>
        @error('email')
            <div class="text-sm text-danger">
                E-mail ou mot de passe incorrect ! Veuillez réessayer.
            </div>
        @enderror
        <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; {{ date('Y') }}</p>
    </form>
@endsection
