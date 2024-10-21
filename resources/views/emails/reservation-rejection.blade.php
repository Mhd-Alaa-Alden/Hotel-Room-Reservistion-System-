@component('mail::message')
# Reservation Rejected

Dear {{ Auth::user()->name }},

We regret to inform you that your room reservation has been rejected.

We apologize for any inconvenience caused.

Best regards,
{{ config('app.name') }}
@endcomponent
