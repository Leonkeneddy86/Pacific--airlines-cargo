<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Vuelo{{ $flight->id }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detalles del Vuelo</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Vuelo #{{ $flight->id }}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Fecha:</strong> {{ $flight->date }}</li>
                    <li class="list-group-item"><strong>Salida:</strong> {{ $flight->departure }}</li>
                    <li class="list-group-item"><strong>Llegada:</strong> {{ $flight->arrival }}</li>
                    <li class="list-group-item"><strong>Preview del Vuelo:</strong> {{ $flight->image }}</li>
                    <li class="list-group-item"><strong>Estado:</strong> {{ $flight->available }}</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>