@component('mail::message')
# Su usuario ha sido creado

¡Hola {{ $notifiable->name }}!

Su usuario ha sido creado correctamente en {{ config('app.name') }}.

Gracias por unirse a nosotros.

Atentamente,
El equipo de Fantasy Books
@endcomponent
