@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">

            <h3 class="page__heading">Carreras</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-blog')
                                <a class="btn btn-warning" href="{{ route('carreras.create') }}">Nueva carrera</a>
                            @endcan

                            <table id="blogs" class="table table-striped mt-2" style="width:100%">
                                <thead style=" background-color:#6777ef">
                                <th style="color:#fff;">carrera</th>
                                <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($carreras as $carrera)
                                    <tr>
                                        <td>{{ $carrera->nombre }}</td>
                                        <td>
                                            <form action="{{ route('carreras.destroy',$carrera->id) }}" method="POST">
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
                        <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $carreras->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
