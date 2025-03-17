@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 401 - Acceso no autorizado</title>
</head>
<body>
    <body>
        <div class="container">
            <div class="error-code">401</div>
            <div class="error-message">¡Vaya! Acceso no autorizado.</div>
            @guest
                <a href="{{ route('login') }}">Iniciar sesión</a>
            @else
                <a href="{{ route('register') }}">Ir a registrarse</a>
            @endguest
        </div>
    </body>
    </html>
    
    @endsection