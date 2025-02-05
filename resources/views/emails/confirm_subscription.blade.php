<!-- filepath: /home/ygryan/lab/YoungBlog/resources/views/emails/confirm_subscription.blade.php -->
@component('mail::message')
    # Confirmation d'abonnement

    Merci de vous être abonné à notre newsletter ! Veuillez confirmer votre abonnement en cliquant sur le bouton ci-dessous
    :

    @component('mail::button', ['url' => $url])
        Confirmer mon abonnement
    @endcomponent

    Merci,<br>
    {{ config('app.name') }}
@endcomponent
