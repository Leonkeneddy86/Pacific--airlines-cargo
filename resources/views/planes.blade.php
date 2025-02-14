@extends("layouts.app")

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviones</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-4">Lista de los aviones</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>

                @foreach (plane as planes )
                    
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nombre del Plan</th>
                    <th class="py-3 px-6 text-left">Descripción</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">Plan A</td>
                    <td class="py-3 px-6">Descripción del Plan A</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">Plan B</td>
                    <td class="py-3 px-6">Descripción del Plan B</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">Plan C</td>
                    <td class="py-3 px-6">Descripción del Plan C</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">Plan D</td>
                    <td class="py-3 px-6">Descripción del Plan D</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">Plan E</td>
                    <td class="py-3 px-6">Descripción del Plan E</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        fetch('planes') 
            .then(response => response.json())
            .then(data => {
                
                const tbody = document.querySelector('tbody');
                tbody.innerHTML = ''; 

                data.forEach(plan => {
                    const row = document.createElement('tr');
                    row.className = 'border-b border-gray-300 hover:bg-gray-100';
                    row.innerHTML = `
                        <td class="py-3 px-6">${plan.nombre}</td>
                        <td class="py-3 px-6">${plan.descripcion}</td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error('Error al obtener los aviones:', error));
    </script>
</body>
</html>

@endsection