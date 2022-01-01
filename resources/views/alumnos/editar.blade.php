@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar alumno</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

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


                                <form action="{{ route('alumnos.update',$alumnos->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="Nombre" class="form-control"  value="{{ $alumnos->Nombre }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="ApellidoP">Apellido Paterno</label>
                                            <input type="text" name="ApellidoP" class="form-control" value="{{ $alumnos->ApellidoP }}">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="ApellidoM">Apellido Materno</label>
                                            <input type="text" name="ApellidoM" class="form-control" value="{{ $alumnos->ApellidoM }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="NumControl">Número de control</label>
                                            <input type="text" name="NumControl" class="form-control"
                                                   style="text-transform:uppercase;" value="{{ $alumnos->NumControl }}"
                                                   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="carreraid">carrera:</label>
                                        <select name="carreraid" id="carreraid" class="form-control" required>
                                            <option disabled selected value>Selecciona una carrera</option>
                                            @foreach($carreras as $carrera)
                                                <option value="{{$carrera->id}}" @if($alumnos->carreraid=== $carrera->id) selected='selected' @endif>{{$carrera->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group text-center m-2">
                                        <button type="submit" class="btn btn-primary m-1">Guardar</button>
                                        <a href="{{route('alumnos.index')}}" class="btn btn-danger m-1">Cancelar</a>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
