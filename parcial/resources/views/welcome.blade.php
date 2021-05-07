<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <script>window.laravel={csrfToken: '{{ csrf_token() }}'}</script>
                
    </head>
    <body class="antialiased">
       <div id="app">
            
                <!--se incluyen los componentes de vue-->
               
                <registros-list></registros-lis>
       </div>
       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
