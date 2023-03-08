<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventapop.com - Solicitud de revisor</title>
</head>
<body>
    <div>
        <h1>Un usuario quiere trabajar con nosotros</h1>
        <h2>Datos del solicitante:</h2>
        <p><b>Nombre: </b>{{ $user->name }}</p>
        <p><b>Email: </b>{{ $user->email }}</p>
        <p>Si quieres que forme parte del equipo de Ventapop, clica el siguiente enlace:</p>
        <a href="{{ route('revisor.make', $user) }}" class="btn btn-success nav-link">Aceptar solicitud</a> 
    </div>
</body>
</html>