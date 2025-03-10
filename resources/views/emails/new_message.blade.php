<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message</title>
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
                            <p style="font-family: Arial, sans-serif; font-size: 14px; margin: 5px 0;">Vous venez de
                                recevoir un nouveau message.</p>
                        </td>
                    </tr>

                    <!-- Contenu principal -->
                    <tr>
                        <td style="padding: 20px;">
                            <h2
                                style="font-family: Arial, sans-serif; font-size: 20px; color: #333333; margin: 0 0 10px;">
                                Salut Boss,</h2>
                            <p
                                style="font-family: Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6;">
                                Un nouveau message vous a été envoyé de la part de {{ $name }}.
                            </p>
                            <div style="text-align: center; margin-top: 20px;">
                                <a href="{{ route('messages.show', $id) }}"
                                    style="display: inline-block; background-color: #C38B02; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-family: Arial, sans-serif; font-size: 14px;">
                                    Voir le message →
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
