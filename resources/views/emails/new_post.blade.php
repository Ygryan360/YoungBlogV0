<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel article publié: {{ $post->title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            padding: 30px;
            background-color: #1a191e;
        }

        h1,
        h3 {
            font-family: "Barlow", sans-serif;
            color: #fff;
            margin-bottom: 20px;
        }

        p,
        small {
            font-family: "Montserrat", sans-serif;
            color: #ddd;
            margin: 10px 0;
        }

        small {
            font-style: italic;
        }

        img {
            width: 100%;
        }

        .email-container {
            max-width: 600px;
        }

        .content {
            padding: 20px 0;
        }

        .btn-container {
            margin: 30px 0;
        }

        .btn {
            text-decoration: none;
            color: #fff;
            background-color: #C38B02;
            padding: 10px 15px;
            line-height: 1.5;
            display: inline-block;
            text-align: center;
            font-family: "Barlow", sans-serif;
        }

        .footer {
            background-color: #1d1c21;
            padding: 30px 10px;
            text-align: center;
            margin-top: 20px;
        }

        @media all and (max-width: 348px) {
            .content {
                padding: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h3 style="text-align: center;">{{ config('app.name') }}</h3>
            <p>Bonjour, Un nouvel article a été publié sur notre blog. Voici un aperçu :</p>
            <h1>{{ Str::limit($post->title, 50) }}</h1>
        </div>
        <div class="content">
            <img src="{{ $post->cover ?? asset('img/cover.png') }}" alt="{{ $post->title }}">
            <div>
                {!! Str::limit($post->content, 500) !!}
            </div>
            <div class="btn-container">
                <a href="{{ route('blog.show', [$post->slug, $post->id]) }}" class="btn">Lire l'article complet</a>
            </div>
        </div>
        <small>
            Si vous ne souhaitez plus recevoir ces notifications, vous pouvez vous <a href="{{ $unsubscribeUrl }}"
                style="color: #C38B02; text-decoration: underline;">désabonner</a>.
        </small>
        <div class="footer">
            <p>
                Merci,<br>
                &copy; {{ date('Y') }} - {{ config('app.name') }}
            </p>
        </div>
    </div>
</body>

</html>
