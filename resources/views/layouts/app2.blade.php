<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/0/614.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>@yield('title', "Pacific")</title>
    </head>
    <body>
        <div id="app">
            <x-header />
            <main>
                @yield('content')
            </main>
            
            <x-footer />
        </div>
        <script src="{{ asset('js/script.js')}}"></script>
        
    </body>
</html>