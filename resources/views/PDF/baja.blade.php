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
            background-image: url("{{public_path()}}/img/membrete-itsta.png");
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
            background-color: white;
        }

        td {
            width: 4.5cm;
            height: 4.5cm;
            background-color: white;
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
<h6><b>BAJA DEFINITIVA</b></h6>
<h6>ALUMNO(A): {{$infoAlumno->Nombre}} {{$infoAlumno->ApellidoP}} {{$infoAlumno->ApellidoM}}</h6>
<h6>No. CONTROL: {{$infoAlumno->NumControl}}    {{$infoAlumno->getCarrera->nombre}}</h6>
<div class="contenido">
    <br>
    <table style="margin-left: 2cm; margin-right: 2cm;">
        <tr>
            <td style="  border: 1px solid black; border-collapse: collapse; border-radius: 1cm;">
                <b>CENTRO DE INFORMACION</b>

                <img src="{{public_path()}}/img/{{$departamentos[0]->firma}}" class="primary">
                <div class="secondary"
                     style=" background-image: url({{public_path()}}/img/{{$departamentos[0]->sello}});"></div>

                <p>{{$departamentos[0]->nombreEncargado}} {{$departamentos[0]->apellidoPEncargado}} {{$departamentos[0]->apellidoMEncargado}}</p>
                <hr style=" margin-left: 0.5cm; margin-right: 0.5cm; ">
                <p>Nombre y firma</p>
            </td>
            <td></td>
            <td>Centro de computo</td>
        </tr>
        <tr>
            <td>DEPARTAMENTO DESARROLLO ACADEMICO</td>
            <td></td>
            <td>DEPARTAMENTO ACADÉMICO</td>
        </tr>
        <tr>
            <td>LABORATORIO</td>
            <td></td>
            <td>RECURSOS MATERIALES</td>
        </tr>
        <tr>
            <td>DEPARTAMENTO EXTRAESCOLAR</td>
            <td>DEPARTAMENTO RECURSOS FINANCIEROS</td>
            <td>DEPARTAMENTO SERVICIOS ESCOLARES</td>
        </tr>

    </table>
    <br>
    <p style="text-align: right; margin-right: 2cm;  ">{{$today2}} </p>

</div>
</body>
</html>
