@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Flights Create</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('flights.store') }}">
                        @csrf

                        <div class="form-group
                        
                        @endsection