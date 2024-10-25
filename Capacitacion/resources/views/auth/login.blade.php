<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1>Iniciar sesión</h1>
            <p>Inicia sesión con tu cuenta de Google</p>
            <a href="{{ route('auth.google') }}" class="btn btn-primary">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" style="width: 20px; height: 20px; margin-right: 8px;">
                Iniciar sesión con Google
            </a>
        </div>
    </div>
</body>
</html>
