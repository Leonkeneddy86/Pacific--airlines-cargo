<?php

class Kernel extends \Illuminate\Foundation\Http\Kernel{
    protected $Admin = [
        'admin' => \App\Http\Middleware\Admin::class,
        'checkAge' => \App\Http\Middleware\CheckAge::class,
    ];
}