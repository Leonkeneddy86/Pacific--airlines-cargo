<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-4">Lista de los vuelos</h1>
        <p class="mb-4">A continuación se muestra una lista de los aviones:</p>
        
        <a href="show" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
            Show
        </a>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Destino</th>
                    <th class="py-3 px-6 text-left">Vuelo</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($flight as $flight)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $flight->destination }}</td>
                    <td class="py-3 px-6">{{ $flight->flight_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        fetch('flight')
            .then(response => response.json())
            .then(data => {
            })
            .catch(error => console.error('Error al obtener los vuelos:', error));
    </script>
</body>
</html>