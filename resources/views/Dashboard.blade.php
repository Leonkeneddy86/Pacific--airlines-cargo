@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Estadísticas</div>
                <div class="card-body">
                    <p>Total Usuarios: {{ $totalUsers }}</p>
                    <p>Total Ventas: {{ $totalSales }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Actividad Reciente</div>
                <div class="card-body">
                    <ul>
                        <li>{{ implode(', ', $recentActivities) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
