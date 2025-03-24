@extends('layouts.app2')

@section('content')

<form action="{{ route('flightsCreate') }}" method="POST" class="max-w-md mx-auto">
  @csrf
  <div class="mb-5">
    <label for="flight_date" class="block text-sm font-medium text-gray-700">Fecha de Vuelo</label>
    <input type="date" name="flight_date" id="flight_date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"/>
  </div>
  
  <div class="mb-5">
    <label for="departure" class="block text-sm font-medium text-gray-700">Aeropuerto de Origen</label>
    <input type="text" name="departure" id="departure" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"/>
  </div>
  
  <div class="mb-5">
    <label for="arrival" class="block text-sm font-medium text-gray-700">Destino</label>
    <input type="text" name="arrival" id="arrival" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"/>
  </div>
  
  <div class="mb-5">
    <label for="available" class="block text-sm font-medium text-gray-700">Disponibilidad</label>
    <input type="number" name="available" id="available" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"/>
  </div>
  
  <button type="submit" onclick="alert('Reserva realizada con éxito');" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
    Enviar Reserva
  </button>
</form>
@endsection