@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                
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
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $flight->date }}</td>
                    <td class="py-3 px-6">{{ $flight->departure }}</td>
                    <td class="py-3 px-6">{{ $flight->arrival }}</td>
                    <td class="py-3 px-6"><img src="{{asset('./Images/ciudad.jpg')}}" alt="Imagen del vuelo" class="w-16 h-16 object-cover"></td>
                    <td class="py-3 px-6">{{ $flight->available }}</td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
</div>

                    @endsection