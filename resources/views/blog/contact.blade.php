@extends('layouts.blog')
@section('og-description',
    'Une question ? Un truc à partager ? Envoyez moi un message et je vous répondrai dans les
    plus brefs délais.')
@section('url', route('blog.contact'))
@section('title', 'Me contacter')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form">
                <h1 class="text-white add-letter-space mb-1">Contactez Moi</h1>
                <p class="mb-5">
                    Vous avez une question ? Un truc à partager ? Envoyez moi un message et je vous répondrai dans les plus
                    brefs délais.
                </p>
                <form method="POST" class="needs-validation" action="{{ route('blog.contact') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label for="name" class="text-black-300">Votre nom</label>
                                <input type="text" id="name" name="name"
                                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="John Doe" required>
                                <p class="invalid-feedback">Votre nom est obligatoire</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label for="email" class="text-black-300">Addresse E-Mail</label>
                                <input type="email" id="email" name="email"
                                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="john.doe@exemple.com" required>
                                <p class="invalid-feedback">E-mail obligatoire!</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-5">
                                <label for="message" class="text-black-300">Votre message</label>
                                <textarea name="message" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="Bonjour, je..." required></textarea>
                                <p class="invalid-feedback">Message obligatoire!</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Envoyer <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
