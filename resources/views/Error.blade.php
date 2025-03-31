@extends('layouts.app')

@section('content')

<div role="alert" class="rounded-md border border-red-300 bg-white p-4 shadow-sm">
    <div class="flex items-start gap-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 text-red-600"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 9v2m0 4h.01M12 17a5 5 0 110-10 5 5 0 010 10z"
        />
      </svg>
  
      <div class="flex-1">
        <strong class="font-medium text-gray-900">401 Acceso No Autorizado</strong>
        <p class="mt-0.5 text-sm text-gray-700">
          No tienes permisos para acceder a este recurso. Por favor, contacta al administrador si crees que se trata de un error.
        </p>
      </div>
  
      <button
        class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700"
        type="button"
        aria-label="Cerrar alerta"
      >
        <span class="sr-only">Cerrar alerta</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-5"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
</div>

@endsection