@extends('layouts.app2')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Aviones</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Places</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planes as $plane)
                    <tr>
                        <td>{{ $plane->name }}</td>
                        <td>{{ $plane->places }}</td>
                        <td>
                            <a href="{{ route('planes', ["action" => "delete", "id" => $plane->id]) }}" class="btn btn-primary">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection