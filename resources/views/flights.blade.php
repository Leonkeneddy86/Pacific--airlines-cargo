@extends('layouts.app')

@section('content')

<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold mb-4">Lista de los vuelos</h1>
        

        <div class="mb-4">
            <form action="{{ route('flightsCreate') }}" method="GET">
            @csrf
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Crear Reserva
            </button>
            </form>
        </div>
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
                    <td class="py-3 px-6"><img src="./Images/avion.jpg" alt="Imagen del vuelo" class="w-16 h-16 object-cover"></td>
                    <td class="py-3 px-6">{{ $flight->available }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

@endsection