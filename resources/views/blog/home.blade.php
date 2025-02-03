@extends('layouts.blog')
@section('title', 'Accueil')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <h1 class="text-white add-letter-space mb-5">À la une &rarr;</h1>
            @foreach ($posts as $post)
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{ route('blog.show', [$post->slug, $post->id]) }}">
                        <img class="card-img-top rounded-0" src="{{ $post->cover ?? asset('img/cover.png') }}" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover"
                                href="{{ route('blog.show', [$post->slug, $post->id]) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <ul class="post-meta mt-3">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <span class="ml-1 text-white">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                                </span>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="{{ route('blog.category', $post->category->name) }}">
                                    {{ $post->category->name }}
                                </a>
                            </li>
                        </ul>
                        <p class="card-text my-4">
                            {{ \Str::limit($post->content, 100) }}
                        </p>
                        <a href="{{ route('blog.show', [$post->slug, $post->id]) }}" class="btn btn-primary">Lire plus
                            &rarr;</a>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget text-center"><a href="about.html">
                    <img class="author-thumb-sm rounded-circle d-block mx-auto" src="images/author-sm.png" alt="">
                </a>
                <h2 class="widget-title text-white d-inline-block mt-4">À propos de moi</h2>
                <p class="mt-4">Je suis Rayane Tchabodi, passionné par la technologie et l'informatique.
                    Enthousiaste du code et des nouvelles innovations, je fusionne créativité et expertise
                    technique dans chaque projet.
                </p>
                <ul class="list-inline mt-3">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/ryan_tchabodi" class="text-white text-red-onHover pr-2">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/rayane.tcabodi" class="text-white text-red-onHover p-2">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/ryantchabodi/" class="text-white text-red-onHover p-2">
                            <span class="fab fa-instagram"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://wa.me/22890809917" class="text-white text-red-onHover p-2">
                            <span class="fab fa-whatsapp"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end of author-widget -->

            <div class="widget bg-dark p-4 text-center">
                <h2 class="widget-title text-white d-inline-block mt-4">S'abonner</h2>
                <p class="mt-4">Abonnez-vous à notre Newsletter pour rester au courant de nos nouveaux
                    posts et informations !</p>
                <form action="https://formspree.io/f/xwkddybd" method="POST">
                    <div class="form-group">
                        <input type="email" required name="Newsletter-Submint"
                            class="form-control bg-transparent rounded-0 my-4" placeholder="Entrez votre email ici...">
                        <button class="btn btn-primary" type="submit">S'abonner <img src="images/arrow-right.png"
                                alt=""></button>
                    </div>
                </form>
            </div>
            <!-- end of subscription-widget -->

            <div class="widget">
                <div class="mb-5 text-center">
                    <h2 class="widget-title text-white d-inline-block">Encore Plus</h2>
                </div>
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="articles/comment-traiter-ses-exercices/comment-traiter-ses-exercices.html">
                        <img class="card-img-top rounded-0" src="images/post/post-md/01.png" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover"
                                href="articles/comment-traiter-ses-exercices/comment-traiter-ses-exercices.html">Comment
                                traiter ses exercices sans apprendre ni réflécchir</a>
                        </h2>
                        <ul class="post-meta mt-3 mb-4">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#">28 Novembre 2023</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">Etudes</a>
                            </li>
                        </ul>
                        <a href="articles/comment-traiter-ses-exercices/comment-traiter-ses-exercices.html"
                            class="btn btn-primary">Lire Plus <img src="images/arrow-right.png" alt=""></a>
                    </div>
                </div>
                <!-- end of widget-post-item -->
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="articles/comment-pirater-le-whatsapp-de-son/comment-pirater-le-whatsapp-de-son.html">
                        <img class="card-img-top rounded-0" src="images/post/post-md/02.png" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover"
                                href="articles/comment-pirater-le-whatsapp-de-son/comment-pirater-le-whatsapp-de-son.html">Comment
                                Pirater le Whatsapp de sa copine ou de son copain </a>
                        </h2>
                        <ul class="post-meta mt-3 mb-4">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#">28 Novembre 2023</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">Tech</a>
                            </li>
                        </ul>
                        <a href="articles/comment-pirater-le-whatsapp-de-son/comment-pirater-le-whatsapp-de-son.html"
                            class="btn btn-primary">Lire Plus <img src="images/arrow-right.png" alt=""></a>
                    </div>
                </div>
                <!-- end of widget-post-item -->
            </div>
            <!-- end of post-items widget -->
        </div>
    </div>
@endsection
