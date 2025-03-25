@extends('layouts.app2')

@section('content')

<header class="bg-cover bg-center h-96" style="background-image: public/images/banner.png;">
  <div class="flex items-center justify-center h-full bg-blue-900 bg-opacity-50">
    <div class="text-center">
      <h1 class="text-white text-4xl font-bold">Bienvenido a Pacific Airline Cargo</h1>
      <p class="text-blue-200 text-xl mt-4">Tu experiencia de vuelo, nuestra prioridad</p>
      <a href="./flightsCreate" class="mt-8 inline-block bg-white text-blue-900 font-semibold py-2 px-6 rounded-full hover:bg-blue-100">
        Reserva Ahora
      </a>
      <a href="./flights" class="mt-8 inline-block bg-white text-blue-900 font-semibold py-2 px-6 rounded-full hover:bg-blue-100">
        Ver Vuelos
      </a>
      <a href="mailto:jonathan19.jtv@gmail.com" class="mt-8 inline-block bg-white text-blue-900 font-semibold py-2 px-6 rounded-full hover:bg-blue-100">
        Contáctame
      </a>
      <a href="https://github.com/Leonkeneddy86" class="mt-8 inline-block bg-white text-blue-900 font-semibold py-2 px-6 rounded-full hover:bg-blue-100">
        GitHub</a>
        <a href="https://www.linkedin.com/in/jonathantorreblanca/" class="mt-8 inline-block bg-white text-blue-900 font-semibold py-2 px-6 rounded-full hover:bg-blue-100">
        LinkedIn </a>
    </div>
  </div>
</header>
<section class="py-12 bg-gray-100">
  <div class="container mx-auto px-4">
    <div class="text-center mb-8">
      <h2 class="text-3xl font-bold">Nuestros Servicios</h2>
      <p class="text-gray-600 mt-2">Vuelos seguros, confortables y exclusivos para cada pasajero.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-2">Vuelos Charter</h3>
        <p class="text-gray-600">Disfruta de vuelos privados a tu medida con el máximo confort.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-2">Asistencia VIP</h3>
        <p class="text-gray-600">Servicio exclusivo y personalizado desde el check-in hasta tu destino.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-2">Reservas Online</h3>
        <p class="text-gray-600">Gestiona tus reservas de forma fácil y rápida desde cualquier dispositivo.</p>
      </div>
    </div>
  </div>
</section>
@endsection