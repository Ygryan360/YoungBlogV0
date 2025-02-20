<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'abonnement</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        h1,
        h3 {
            font-family: "Barlow", sans-serif;
            color: #fff;
            margin-bottom: 20px;
        }

        p {
            font-family: "Montserrat", sans-serif;
            color: #ddd;
            margin: 10px 0;
        }

        .email {
            display: flex;
            justify-content: center;
            padding: 30px;
            text-align: center;
            background-color: #1a191e;
        }

        .email-container {
            max-width: 600px;
        }

        .content {
            padding: 20px;
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
        }

        @media all and (max-width: 348px) {
            .content {
                padding: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="email">
        <div class="email-container">
            <div class="header">
                <h3>{{ env('APP_NAME') }}</h3>
                <h1>Confirmation d'abonnement</h1>
            </div>
            <div class="content">
                <p>Bonjour {{ $email }},</p>
                <p>Merci de vous être abonné à notre newsletter ! Veuillez confirmer votre abonnement en cliquant sur le
                    bouton ci-dessous :
                </p>

                <div class="btn-container">
                    <a href="{{ $url }}" class="btn">Confirmer mon abonnement</a>
                </div>
                <p>Si vous n'avez pas demandé cet abonnement, vous pouvez ignorer cet email.</p>
            </div>
            <div class="footer">
                <p>
                    Merci,<br>
                    &copy; {{ date('Y') }} - {{ config('app.name') }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>
