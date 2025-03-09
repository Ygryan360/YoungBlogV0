@extends('layouts.blog')
@section('content')
    <div class="row mb-5">
        <div class="col-md-9">
            <h1 class="text-white add-letter-space mb-3">@yield('title') :-(</h1>
            <h2 class="text-white add-letter-space mb-3">Erreur @yield('code')</h2>
            <p class="mt-4">
                @yield('message')
            </p>
            <p class="mb-4">
                Cliquez sur le bouton ci-dessous pour retourner à la page d'accueil.
            </p>
            <a href="{{ route('blog.home') }}" class="btn btn-primary">Accueil</a>
        </div>
    </div>
@endsection
