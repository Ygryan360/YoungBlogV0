@extends('layouts.blog')
@section('og-description',
    'je prends la protection de vos données personnelles très au sérieux. Consultez ma
    politique de confidentialité pour en savoir plus.')
@section('url', route('blog.privacy'))
@section('title', 'Me contacter')
@section('content')
    <div class="row mb-5">
        <div class="col-md-9">
            <h1 class="text-white add-letter-space mb-3">Politique de Confidentialité</h1>
            <ul class="list-unstyled">
                <li class="bullet-list-item mb-5">
                    <h3 class="text-white mb-3 add-letter-space">Collecte d'Informations:</h3>
                    <p>
                        Je ne collecte aucune information personnelle identifiable sur les visiteurs de
                        ce site. Vous pouvez parcourir le site en toute confidentialité sans que vos données
                        personnelles soient enregistrées.
                    </p>
                </li>
                <li class="bullet-list-item mb-5">
                    <h3 class="text-white mb-3 add-letter-space">Cookies:</h3>
                    <p>Je n'utilise pas de cookies pour suivre votre activité en ligne.</p>
                </li>
                <li class="bullet-list-item mb-5">
                    <h3 class="text-white mb-3 add-letter-space">Liens Externes:</h3>
                    <p>
                        Ce site peut contenir des liens vers d'autres sites web. Veuillez noter que je ne
                        suis pas responsables des pratiques de confidentialité de ces autres sites. Je vous encourage à être conscient lorsque vous quittez mon site et à lire les
                        déclarations de confidentialité de chaque site web qui collecte des informations
                        personnelles.
                    </p>
                </li>
                <li class="bullet-list-item">
                    <h3 class="text-white mb-3 add-letter-space">Sécurité:</h3>
                    <ol class="pl-0">
                        <li class="mb-2">
                            Toute modification de ma politique de confidentialité sera publiée sur cette page.
                        </li>
                        <li class="mb-2">
                            En continuant à utiliser ce site, vous acceptez cette politique de confidentialité.
                        </li>
                    </ol>
                </li>
            </ul>
        </div>
    </div>
@endsection
