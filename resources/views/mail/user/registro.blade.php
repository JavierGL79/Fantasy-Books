<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestra aplicación</title>
</head>
<body>
    <h1>Bienvenido a nuestra aplicación, {{ $user->name }}!</h1>
    
    <p>Te damos la bienvenida a nuestra comunidad. Tu cuenta ha sido creada con éxito.</p>
    
    <p>A continuación, encontrarás algunos detalles sobre tu cuenta:</p>
    
    <ul>
        <li><strong>Nombre de usuario:</strong> {{ $user->username }}</li>
        <li><strong>Nombre:</strong> {{ $user->name }}</li>
        <li><strong>Correo electrónico:</strong> {{ $user->email }}</li>
    </ul>
    
    <p>Gracias por unirte a nosotros.</p>
    
    <p>Atentamente,<br>{{ config('app.name') }}</p>
</body>
</html>
