<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'abonnement</title>
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
                                Bonjour {{ $email }},</h2>
                            <p
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                Merci de vous être abonné à notre newsletter ! Nous sommes ravis de vous compter parmi
                                nos lecteurs fidèles.
                            </p>
                            <p
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                Pour finaliser votre inscription, veuillez confirmer votre abonnement en cliquant sur le
                                bouton ci-dessous :
                            </p>
                            <div style="text-align: center; margin-top: 20px;">
                                <a href="{{ $url }}"
                                    style="display: inline-block; background-color: #C38B02; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-family: Arial, sans-serif; font-size: 14px;">
                                    Confirmer mon abonnement →
                                </a>
                            </div>
                            <p
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6; margin-top: 20px;">
                                Si vous n'avez pas demandé cet abonnement, vous pouvez ignorer cet email. Aucune action
                                ne sera entreprise de notre part.
                            </p>
                        </td>
                    </tr>

                    <!-- Pied de page -->
                    <tr>
                        <td style="padding: 20px; text-align: center; background-color: #f9f9f9; color: #555555;">
                            <p style="font-family: Arial, sans-serif; font-size: 12px; margin: 0;">
                                Vous recevez cet email car vous avez souscrit à notre newsletter.
                            </p>
                            <p style="font-family: Arial, sans-serif; font-size: 12px; margin: 10px 0 0;">
                                &copy; {{ date('Y') }} - {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
