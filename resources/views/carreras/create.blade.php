@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear carrera</h3>
        </div>
        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('carreras.store')}}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('carreras.index')}}" class="btn btn-danger m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection


