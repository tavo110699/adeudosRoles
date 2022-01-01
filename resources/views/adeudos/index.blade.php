@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">

            <h3 class="page__heading">Resultado de busqueda alumno</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="blogs" class="table table-striped mt-2" style="width:100%">
                                <thead style=" background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Apellido Paterno</th>
                                <th style="color:#fff;">Apellido Materno</th>
                                <th style="color:#fff;">N° de control</th>
                                <th style="color:#fff;">Carrera</th>
                                <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($alumnos as $alumno)
                                    <tr>
                                        <td style="display: none;">{{ $alumno->id }}</td>
                                        <td>{{ $alumno->Nombre }}</td>
                                        <td>{{ $alumno->ApellidoP }}</td>
                                        <td>{{ $alumno->ApellidoM }}</td>
                                        <td>{{ $alumno->NumControl }}</td>
                                        <td>{{ $alumno->getCarrera->nombre }}</td>
                                        <td>
                                                @can('editar-blog')
                                                    <a class="btn btn-info" href="{{ route('adeudos.show',$alumno->id) }}">Verificar</a>
                                                @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        <!-- Ubicamos la paginacion a la derecha -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
