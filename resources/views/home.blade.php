@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">BIENVENIDO A LA LIBERACIÓN DE CONSTANCIA DE NO ADEUDOS</h3>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">

                                            <h5 p style="text-align:center">CENTRO DE INFORMACIÓN</h5>
                                            <i class="fa fa-users f-left"></i>
                                            <p class="m-b-0 text-right"><a href="/c_informacion" class="text-white">Ir
                                                </a></p>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card  order-card">
                                        <div class="card-block">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5 p style="text-align:center">CENTRO DE COMPUTO</h5>
                                            <h2 class="text-right"><i
                                                    class="fas fa-laptop-house fa-7x fa-lg"></i></h2>
                                            <p class="m-b-0 text-right"><a href="/c_computo" class="text-white">Ir</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5 p style="text-align:center">DEPARTAMENTO DESARROLLO ACADEMICO</h5>

                                            <h2 class="text-center"><i
                                                    class="fa fa-blog f-left"></i></h2>
                                            <p class="m-b-0 text-right"><a href="/dep_desarrolloacademico" class="text-white">Ir</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 col-xl-4">
                                    <div class="card order-card">
                                        <div class="card-block">


                                            <h2 class="text-right"><i
                                                    class="fas fa-laptop-house fa-7x fa-lg"></i></h2>
                                            <p class="m-b-0 text-right"><a href="/home" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5 p style="text-align:center">DEPARTAMENTO ACADEMICO</h5>

                                            <h2 class="text-center">

                                                <i class="fa fa-blog f-left"></i></h2>
                                            <p class="m-b-0 text-right"><a href="/dept_academico" class="text-white">Ir</a>
                                            </p>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5 p style="text-align:center">LABORATORIO</h5>

                                            <h2 class="text-center">
                                                <i class="fas fa-flask fa-6x fa-lg"></i></h2>
                                            <p class="m-b-0 text-right"><a href="/laboratorio" class="text-white">Ir</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
