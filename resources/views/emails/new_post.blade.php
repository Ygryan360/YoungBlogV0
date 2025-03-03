<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel article publié: {{ $post->title }}</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 20px;">
                <table cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <!-- En-tête -->
                    <tr>
                        <td style="padding: 20px; text-align: center; background-color: #C38B02; color: #ffffff;">
                            <h1 style="font-family: Arial, sans-serif; font-size: 24px; margin: 0;">
                                {{ config('app.name') }}</h1>
                            <p style="font-family: Arial, sans-serif; font-size: 14px; margin: 5px 0;">Votre source
                                quotidienne d'inspiration</p>
                        </td>
                    </tr>

                    <!-- Contenu principal -->
                    <tr>
                        <td style="padding: 20px;">
                            <h2
                                style="font-family: Arial, sans-serif; font-size: 20px; color: #333333; margin: 0 0 10px;">
                                Bonjour,</h2>
                            <p
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                Nous espérons que vous allez bien ! Aujourd'hui, nous avons le plaisir de partager avec
                                vous un nouvel article passionnant sur notre blog.
                                Préparez-vous à découvrir des idées innovantes et des conseils pratiques qui pourraient
                                changer votre vision des choses.
                            </p>
                            <h3
                                style="font-family: Arial, sans-serif; font-size: 18px; color: #333333; margin: 20px 0 10px;">
                                Nouveau : {{ Str::limit($post->title, 50) }}</h3>
                            <img src="{{ $post->cover ?? asset('img/cover.png') }}" alt="{{ $post->title }}"
                                style="width: 100%; display: block; margin-bottom: 20px; border-radius: 8px;">
                            <div
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                {!! Str::limit($post->content, 300) !!}
                            </div>
                            <div style="text-align: center; margin-top: 20px;">
                                <a href="{{ route('blog.show', [$post->slug, $post->id]) }}"
                                    style="display: inline-block; background-color: #C38B02; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-family: Arial, sans-serif; font-size: 14px;">
                                    Lire l'article complet →
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Section secondaire -->
                    <tr>
                        <td style="padding: 20px; background-color: #f9f9f9;">
                            <h3
                                style="font-family: Arial, sans-serif; font-size: 18px; color: #333333; margin: 0 0 10px;">
                                D'autres articles qui pourraient vous intéresser :</h3>
                            <ul
                                style="list-style-type: disc; padding-left: 20px; font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                <li><a href="#" style="color: #C38B02; text-decoration: none;">Comment rester
                                        productif en télétravail</a></li>
                                <li><a href="#" style="color: #C38B02; text-decoration: none;">Les tendances
                                        technologiques de 2023</a></li>
                                <li><a href="#" style="color: #C38B02; text-decoration: none;">5 astuces pour
                                        mieux gérer votre temps</a></li>
                            </ul>
                        </td>
                    </tr>

                    <!-- Pied de page -->
                    <tr>
                        <td style="padding: 20px; text-align: center; background-color: #C38B02; color: #ffffff;">
                            <p style="font-family: Arial, sans-serif; font-size: 12px; margin: 0;">Si vous ne souhaitez
                                plus recevoir ces notifications, vous pouvez vous <a href="{{ $unsubscribeUrl }}"
                                    style="color: #ffffff; text-decoration: underline;">désabonner</a>.</p>
                            <p style="font-family: Arial, sans-serif; font-size: 12px; margin: 10px 0 0;">&copy;
                                {{ date('Y') }} - {{ config('app.name') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
