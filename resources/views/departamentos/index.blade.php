@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">

            <h3 class="page__heading">Departamentos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-blog')
                                <a class="btn btn-warning" href="{{ route('departamentos.create') }}" hidden>Nuevo departamento (ocultar al final)</a>
                            @endcan


                            <table id="blogs" class="table table-striped mt-2" style="width:100%">
                                <thead style=" background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Encargado</th>
                                <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($departamentos as $departamento)
                                    <tr>
                                        <td style="display: none;">{{ $departamento->id }}</td>
                                        <td>{{ $departamento->nombreDepartamento }}</td>
                                        <td>{{ $departamento->nombreEncargado }} {{ $departamento->apellidoPEncargado }} {{ $departamento->apellidoMEncargado }} </td>
                                        <td>
                                            <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="POST">
                                                @can('editar-blog')
                                                    <a class="btn btn-info" href="{{ route('departamentos.edit',$departamento->id) }}">Editar</a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-blog')
                                                    <button type="submit" class="btn btn-danger" hidden>Borrar (ocultar al final)</button>
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
                                {!! $departamentos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
