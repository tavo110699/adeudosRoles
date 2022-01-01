@extends('layouts.app')

@section('content')


    <div class="section">
        <div class="section-header">
            <h3 class="page__heading">Modificar informacion departamento</h3>
        </div>
        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">
                        <form action="{{route('departamentos.update',$departamentos->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombreDepartamento">Nombre del departamento: </label>
                                <input class="form-control" type="text" name="nombreDepartamento"
                                       id="nombreDepartamento" required
                                       placeholder="Ingrese el nombre del departamento" value="{{$departamentos->nombreDepartamento}}">
                            </div>

                            <div class="form-group">
                                <label for="nombreEncargado">Nombre del encargado: </label>
                                <input class="form-control" type="text" name="nombreEncargado" id="nombreEncargado"
                                       required
                                       placeholder="Ingrese el nombre" value="{{$departamentos->nombreEncargado}}">
                            </div>
                            <div class="form-group">
                                <label for="apellidoPEncargado">Apellido Paterno del encargado:</label>
                                <input class="form-control" type="text" name="apellidoPEncargado"
                                       id="apellidoPEncargado" required
                                       placeholder="Ingrese el apellido Paterno" value="{{$departamentos->apellidoPEncargado}}">
                            </div>

                            <div class="form-group">
                                <label for="apellidoMEncargado">Apellido Materno del encargado:</label>
                                <input class="form-control" type="text" name="apellidoMEncargado"
                                       id="apellidoMEncargado" required
                                       placeholder="Ingrese el apellido materno" value="{{$departamentos->apellidoMEncargado}}">
                            </div>

                            <div class="form-group">
                                <label>sube el sello </label>
                                <input class="form-control" type="file" name="selloimg" id="selloimg"
                                       placeholder="Ingrese la imagen del sello">
                                <div class="ml-2 col-sm-6">
                                    <img
                                        src="{{ asset('img/'.$departamentos->sello) }}"
                                        id="preview" class="img-thumbnail">
                                </div>

                            </div>

                            <div class="form-group">
                                <label>sube la firma </label>
                                <input class="form-control" type="file" name="firmaimg" id="firmaimg"
                                       placeholder="Ingrese la imagen de la firma" value="{{ asset('img/'.$departamentos->firma) }}">
                                <div class="ml-2 col-sm-6">
                                    <img
                                        src="{{ asset('img/'.$departamentos->firma) }}"
                                        id="preview" class="img-thumbnail">
                                </div>
                            </div>

                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('departamentos.index')}}" class="btn btn-danger m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        $(document).ready(function (e) {
            $('#sello').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection

