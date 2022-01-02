@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card-deck col-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Detalles del alumno</h6>
                </div>
                <div class="card-body">
                    <p>
                        <b>Nombre: </b><br> {{$alumnos->Nombre}} {{$alumnos->ApellidoP}} {{$alumnos->ApellidoM}}</p>
                    <p>
                        <b>Nº de control:</b>
                        <br>{{$alumnos->NumControl}}</p>
                    <p>Carrera: {{$alumnos->getCarrera->nombre}}</p>
                </div>
            </div>
        </div>

        <div class="card-deck col-4" style="margin-left: 0.5cm;">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Estado del alumno</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        @php
                            if(!$adeudos->isEmpty()){
                                  echo ' <button type="button" class="btn btn-danger" type="button" class="btn btn-success" style="width:100px; height:100px"  data-toggle="modal" data-target="#exampleModal">
      <i class="far fa-times-circle" style="font-size: 80px;"></i>
    </button>';
                            } else {
                          echo '<button type="button" class="btn btn-success" type="button" class="btn btn-success" style="width:100px; height:100px"  data-toggle="modal" data-target="#exampleModal">
        <i class="far fa-check-circle" style="font-size: 80px;"></i>
    </button>';
                            }
                        @endphp
                    </div>
                    <br>
                    <br>
                    <br>
                    <h3 class="text-center">
                        @php
                            if(!$adeudos->isEmpty()){
                            echo 'Cuenta con Adeudos';
                        } else {  echo 'No tiene Adeudos';}
                        @endphp
                    </h3>
                    <br><br>
                    <div class="text-center">
                        @php

                            if(!$adeudos->isEmpty()){
                            echo'<p>Se permitira descargar el pdf al saldar las deudas registradas</p>';
                         } else { echo '<p>Puedes generar la constancia de no adeudos en la parte inferior de esta pagina</p>';}
                        @endphp
                    </div>
                </div>
            </div>
        </div>


        <div class="card-deck col-4" style="margin-left: 0.5cm;">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Añadir adeudo</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <form action="{{route('adeudos.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="idAlumno" id="idAlumno"
                                       value="{{$alumnos->id}}">
                                <select name="idDepartamento" id="idDepartamento" class="form-control" required>
                                    <option disabled selected value>Selecciona departamento</option>
                                    @foreach($departamentos as $departamento)
                                        <option
                                            value="{{$departamento->id}}">{{$departamento->nombreDepartamento}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Motivo de adeudo:</label>
                                <textarea name="descripcion" id="descripcion" rows="7" cols="35"
                                          placeholder="Ingresa el motivo del adeudo"></textarea>
                                <br><br>
                                <button type="submit" class="btn btn-success ">Agregar Adeudo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6>Detalles del alumno</h6>
                        </div>
                        <div class="col-auto">
                            <button onclick="location.href = '/buscar'"
                                    class="btn btn-info text-white">Nueva busqueda
                            </button>
                        </div>

                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped ">

                            <thead class="table" style="background-color:#6777ef">
                            <tr>
                                <th style="color:#fff">Registrado por</th>
                                <th style="color:#fff">Departamento</th>
                                <th style="color:#fff">Descripcion</th>
                                <th style="color:#fff">fecha de registro</th>
                                <th style="color:#fff">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>

                            @foreach($adeudos as $adeudo)
                                <tr>
                                    <td>{{$adeudo->getUser->name}}</td>
                                    <td>{{$adeudo->getDepartamento->nombreDepartamento}}</td>
                                    <td>{{$adeudo->descripcion  }}</td>
                                    <td>{{$adeudo->created_at  }}</td>
                                    <td>

                                        @can('borrar-alumnos')
                                            @php
                                                $userRegister = $adeudo->idUser;
                                                $userLogin = auth()->user()->id;
                                                $route =  route('adeudos.destroy', $adeudo->id);
                                            @endphp

                                            @if($userRegister === $userLogin)
                                                {!! Form::open(['method'=>'DELETE','route'=>['adeudos.destroy',$adeudo->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('Saldar adeudo', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                                {!! Form::hidden('alumnoId', $value = $adeudo->id) !!}
                                                {!! Form::close() !!}
                                            @else
                                                <p>Unicamente podra marcar como adeudo saldado el usuario quien
                                                    registro</p>
                                    @endif
                                    @endcan
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card ">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Baja definitiva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">Titulacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false">Titulacion Posgrado</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @php
                        $route = route('download-baja', $alumnos->id);
                                              if(!$adeudos->isEmpty()){
                                                  echo'<p>Se permitira descargar el pdf al saldar los adudos correspondientes</p>';
                                                                    } else {
                                                echo '<a class="btn btn-success" href="'.$route.'")><i class="fas fa-arrow-circle-down"></i> Descargar documento</a>';
                                              }
                    @endphp
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @php
                        $route = route('download-titulacion', $alumnos->id);
                                              if(!$adeudos->isEmpty()){
                                                  echo'<p>Se permitira descargar el pdf al saldar los adudos correspondientes</p>';
                                                                    } else {
                                                echo '<a class="btn btn-success" href="'.$route.'")><i class="fas fa-arrow-circle-down"></i> Descargar documento</a>';
                                              }
                    @endphp
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @php
                        $route = route('download-posgrado', $alumnos->id);
                                              if(!$adeudos->isEmpty()){
                                                  echo'<p>Se permitira descargar el pdf al saldar los adudos correspondientes</p>';
                                                                    } else {
                                                echo '<a class="btn btn-success" href="'.$route.'")><i class="fas fa-arrow-circle-down"></i> Descargar documento</a>';
                                              }
                    @endphp
                </div>
            </div>
        </div>
    </div>






@endsection





