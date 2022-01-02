<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$infoAlumno->NumControl}}</title>
    <style>
        * {
            /*
             background-image: url("{{public_path()}}/img/membrete-itsta.png"); */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: 100%;
            margin: 0px;
        }

        h4 {
            text-align: center;
            text-transform: uppercase;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        h5 {
            text-align: center;
            text-transform: uppercase;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        h6 {
            text-align: center;
            text-transform: uppercase;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        table {
            width: 81%;
            text-align: center;
        }

        td {
            width: 4.5cm;
            height: 4.5cm;
            font-family: Verdana, Arial, Helvetica, sans-serif;

        }

        p {
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .primary {
            width: 3cm;
            position: relative;
        }

        .secondary {
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            width: 2.5cm;
            height: 2.5cm;
        }
    </style>
</head>
<body>
<br><br><br><br><br>
<h4><b>INSTITUTO TECNOLÓGICO SUPERIOR DE TANTOYUCA</b></h4>
<h5><b>CONSTANCIA DE NO ADEUDOS</b></h5>
<h6><b>TITULACIÓN</b></h6>
<h6>ALUMNO(A): {{$infoAlumno->Nombre}} {{$infoAlumno->ApellidoP}} {{$infoAlumno->ApellidoM}}</h6>
<h6>No. CONTROL: {{$infoAlumno->NumControl}}    {{$infoAlumno->getCarrera->nombre}}</h6>
<div class="contenido">
    <br>
    <table style="margin-left: 2cm; margin-right: 2cm; ">
        <tr>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>CENTRO DE INFORMACIÓN</b>
                <br>
                <img src="{{public_path()}}/img/{{$departamentos[0]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[0]->sello}});"></div>

                <p>{{$departamentos[0]->nombreEncargado}} {{$departamentos[0]->apellidoPEncargado}} {{$departamentos[0]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td></td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>CENTRO DE COMPUTO</b>
                <br>
                <img src="{{public_path()}}/img/{{$departamentos[1]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[1]->sello}});"></div>

                <p>{{$departamentos[1]->nombreEncargado}} {{$departamentos[1]->apellidoPEncargado}} {{$departamentos[1]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
        </tr>
        <tr>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b style="font-size: 14px;">DEPARTAMENTO DESARROLLO ACADÉMICO</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[2]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[2]->sello}});"></div>

                <p>{{$departamentos[2]->nombreEncargado}} {{$departamentos[2]->apellidoPEncargado}} {{$departamentos[2]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td></td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>DEPARTAMENTO ACADÉMICO</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[3]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[3]->sello}});"></div>

                <p>{{$departamentos[3]->nombreEncargado}} {{$departamentos[3]->apellidoPEncargado}} {{$departamentos[3]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
        </tr>
        <tr>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>LABORATORIO</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[4]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[4]->sello}});"></div>

                <p>{{$departamentos[4]->nombreEncargado}} {{$departamentos[4]->apellidoPEncargado}} {{$departamentos[4]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>SEGUIMIENTO A EGRESADOS</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[9]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[9]->sello}});"></div>

                <p>{{$departamentos[9]->nombreEncargado}} {{$departamentos[9]->apellidoPEncargado}} {{$departamentos[9]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>RECURSOS MATERIALES</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[5]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[5]->sello}});"></div>

                <p>{{$departamentos[5]->nombreEncargado}} {{$departamentos[5]->apellidoPEncargado}} {{$departamentos[5]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
        </tr>
        <tr>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>DEPARTAMENTO EXTRAESCOLAR</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[6]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[6]->sello}});"></div>

                <p>{{$departamentos[6]->nombreEncargado}} {{$departamentos[6]->apellidoPEncargado}} {{$departamentos[6]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>DEPARTAMENTO RECURSOS FINANCIEROS</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[7]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[7]->sello}});"></div>

                <p>{{$departamentos[7]->nombreEncargado}} {{$departamentos[7]->apellidoPEncargado}} {{$departamentos[7]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>DEPARTAMENTO SERVICIOS ESCOLARES</b><br>
                <img src="{{public_path()}}/img/{{$departamentos[8]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[8]->sello}});"></div>

                <p>{{$departamentos[8]->nombreEncargado}} {{$departamentos[8]->apellidoPEncargado}} {{$departamentos[8]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>

        </tr>

    </table>
    <br>
    <p style="text-align: right; margin-right: 2cm;  ">{{$today2}} </p>

</div>
</body>
</html>
