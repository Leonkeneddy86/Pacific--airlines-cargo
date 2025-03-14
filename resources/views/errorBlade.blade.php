@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">¡Vaya! La página que buscas no se encuentra.</div>
        <a href="{{ url('/') }}">Volver al inicio</a>
    </div>
</body>
</html>
