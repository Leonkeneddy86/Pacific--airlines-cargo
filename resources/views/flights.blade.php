@extends('layouts.app2')

@section('content')

<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-4">Lista de los vuelos</h1>
        

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Fecha</th> 
                    <th class="py-3 px-6 text-left">Aeropuerto</th>
                    <th class="py-3 px-6 text-left">Destino</th>
                    <th class="py-3 px-6 text-left">Imagenes</th>
                    <th class="py-3 px-6 text-left">Disponibilidad</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($flight as $flight)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $flight->date }}</td>
                    <td class="py-3 px-6">{{ $flight->departure }}</td>
                    <td class="py-3 px-6">{{ $flight->arrival }}</td>
                    <td class="py-3 px-6"><img src="./Images/ciudad.jpg"{{ $flight->image }}" alt="Imagen del vuelo" class="w-16 h-16 object-cover"></td>
                    <td class="py-3 px-6">{{ $flight->available }}</td>
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
@endsection