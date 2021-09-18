@component('mail::message')
Hola {{ $user['name'] }}
<br>
Ahora puedes acceder a 7P Marketing con las siguientes credenciales
<br>
<br>
Email: {{ $user['email'] }}
<br>
Contraseña: {{ $user['password'] }}

@component('mail::button', ['url' => '/login'])
Iniciar Sesión
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
