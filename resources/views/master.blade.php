<!DOCTYPE html>
<html>
<head>
    <meta charsert="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" contemt="width=device-width, initial-scale=1.0">

    <title>No Adeudos-@yield('titulo')</title>

    <link rel="stylesheet" type="text/css" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css"
          integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
</head>
<body>

@include('layouts.app')
@yield('contenido')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Grid de pinterest-->
<script type="text/javascript" src="{{asset('js/pinterest_grid.js')}}"></script>

<!-- script de pinterest en la carpeta js -->
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<!-- iconos  boostrap-->
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

</body>
</html>
