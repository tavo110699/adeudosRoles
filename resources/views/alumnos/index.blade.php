@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">

            <h3 class="page__heading">Alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-blog')
                                <a class="btn btn-warning" href="{{ route('alumnos.create') }}">Nuevo alumno</a>
                            @endcan


                            <table id="blogs" class="table table-striped mt-2" style="width:100%">
                                <thead style=" background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Apellido Paterno</th>
                                <th style="color:#fff;">Apellido Materno</th>
                                <th style="color:#fff;">N° de control</th>
                                <th style="color:#fff;">Carrea</th>
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
                                            <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                                                @can('editar-blog')
                                                    <a class="btn btn-info" href="{{ route('alumnos.edit',$alumno->id) }}">Editar</a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-blog')
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @section('page_js')
                                <link src="https://code.jquery.com/jquery-3.5.1.js">
                                <link src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
                                <link src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js">
                        @endsection
                        <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $alumnos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
