<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('Titulo')</title>
        <link rel='stylesheet' href="{{asset('css/estilo_basico.css')}}">
        <link href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel = "folha de estilo" > 
        <meta charset="utf-8">
    </head>
    <body>
        @include('app.layouts.partials.topo')
        @yield('content')
    </body>
</html>