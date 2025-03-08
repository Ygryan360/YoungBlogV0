@extends('layouts.blog')
@section('og-description',
    'Je suis Rayane Tchabodi, Bloggeur et passionné de tech. Découvrez mes astuces secrètes sur
    la tech et autres domaines.')
@section('url', route('blog.about'))
@section('title', 'À propos')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <img class="img-fluid" src="{{ asset('img/author.png') }}" alt="Rayane">
            <h1 class="text-white add-letter-space my-4">Salut, je suis Rayane, Developpeur, Bloggeur et passionné
                de tech.</h1>
            {{-- <p>
                Je suis étudiant en première année en Sciences Economique et de gestion (FaSEG) à <a target="_blank"
                    href="https://univ-lome.tg/">L'université de Lomé</a>.
                Je me plonge avec enthousiasme dans les défis complexes du monde numérique. Mon parcours professionnel m'a
                permis de développer des
                compétences pointues en programmation et en conception web, tandis que ma curiosité naturelle me pousse à
                rester à l'avant-garde
                des dernières tendances technologiques. Je crois fermement que la fusion de la créativité et de la précision
                technique est la clé
                pour construire des expériences numériques exceptionnelles. Mon approche va au-delà du code ; elle intègre
                également la compréhension
                des besoins des utilisateurs pour créer des solutions innovantes. En dehors du monde virtuel, vous me
                trouverez probablement en train
                d'explorer de nouvelles idées, que ce soit à travers la programmation de projets personnels ou la découverte
                de nouvelles technologies.
                Ma passion pour l'informatique s'accompagne d'une détermination sans faille à atteindre l'excellence dans
                tout ce que j'entreprends,
                guidé par la conviction que la technologie peut transformer positivement le monde.
            </p>
            <h2 class="text-white add-letter-space my-5">Ici je vous dévoile mes astuces secrètes sur la tech et autres
                domaines</h2>
            <ul class="list-unstyled">
                <li class="bullet-list-item mb-4">
                    <h3 class="text-white mb-3 add-letter-space">Mes compétences ?</h3>
                    <p>
                        Je suis dynamique quand il s'agit de me débrouiller en informatique et en tech, j'ai un esprit
                        créatif, et qui a toujours soif de connaissance quand il s'agit de
                        découvrir un nouveau domaine. Quelque soit le domaine, je m'efforce toujours à me donner à fond.
                    </p>
                </li>
                <li class="bullet-list-item mb-4">
                    <h3 class="text-white mb-3 add-letter-space">Mes réalisations ?</h3>
                    <p>
                        Comme vous le savez déjà, je suis un amateur du dévéloppement web, j'ai donc réalisé un site web
                        pour une société nommée <a target="_blank" href="https://irish-market.onrender.com">Irish
                            Market</a>. Ce projet est toujours en cours de
                        réalisation. <br>
                        Je me débrouille aussi en Graphisme et je j'ai créer des affiches ainsi que des logos. <br>
                        J'ai aussi quelques antécédants avec le BeatMaking, j'ai créer quelques instrumentales de musiques
                        de différents styles musicaux.
                    </p>
                </li>
                <li class="bullet-list-item mb-4">
                    <h3 class="text-white mb-3 add-letter-space">Ma formation</h3>
                    <p>
                        Et bien; Il est vrai que je me suis débrouillé tout seul depuis le début, mais j'ai aussi été aidé
                        par plusieurs facteurs:
                    <ul>
                        <li>Quelques tuto sur le net par ci par là sur lesquels je ne vais pas donner de Détails</li>
                        <li>Informatique approfondie avec l'aide de <a target="_blank" href="https://soltg.com">CleanSoft
                                Solutions</a> qui est une Startup basée dans le domaine de l'informatique</li>
                    </ul>
                    </p>
                </li>
            </ul> --}}
        </div>
    </div>
@endsection
