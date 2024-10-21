@component('mail::message')
    # Room Booked Successfully

    Dear {{ Auth::user()->name }},

    We are pleased to inform you that your room reservation has been confirmed.

    Thank you for choosing our services!

    Best regards,
    {{ config('app.name') }}
@endcomponent
