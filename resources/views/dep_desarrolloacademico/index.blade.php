@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">CONSTANCIA DE NO ADEUDOS</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <h4>Alumno(a)</h4>

                                    @if ($errors->any())
                                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                            <strong>¡Revise los campos!</strong>
                                            @foreach ($errors->all() as $error)
                                                <span class="badge badge-danger">{{ $error }}</span>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form action="{{ route('alumnos.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="Nombre">Nombre</label>
                                                    <input type="text" name="Nombre" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ApellidoP">Apellido Paterno</label>
                                                    <input type="text" name="ApellidoP" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="ApellidoM">Apellido Materno</label>
                                                    <input type="text" name="ApellidoM" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="NumControl">Número de control</label>
                                                    <input type="text" name="NumControl" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="Carrera">Carrera</label>
                                                    <input type="text" name="Carrera" class="form-control">
                                                </div>

                                                <i class="fas fa-info-circle"></i>
                                                <label for="Carrera">No Adeuda</label>
                                                <input type="checkbox" name="adeuda" value="adeuda" autocomplete="off">



                                                <i class="fas fa-info-circle"></i>
                                                <label for="Carrera">Adeuda</label>
                                                <input type="checkbox" name="adeuda" value="adeuda" autocomplete="off">
                                            </div>



                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
