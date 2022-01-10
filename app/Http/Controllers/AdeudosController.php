<?php

namespace App\Http\Controllers;

use App\Models\Adeudos;
use App\Models\Alumnos;
use App\Models\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdeudosController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-blog|crear-blog|editar-blog|borrar-blog')->only('index');
        $this->middleware('permission:crear-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-blog', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $numControl = $request->NumControl;
        $alumnos = Alumnos::where('NumControl', $numControl)->get();


        if ($alumnos != null) {
            return view('adeudos.index', compact('alumnos'));
        }

        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function printPDFbaja($id)
    {
        $infoAlumno = Alumnos::find($id);
        $departamentos = Departamentos::all();
        $today = Carbon::now();
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fecha = Carbon::parse($today);
        $mes = $meses[($fecha->format('n')) - 1];
        $today2 = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $pdf = \PDF::loadView('pdf.baja', compact( 'today2', 'infoAlumno', 'departamentos'));
        $pdf->setPaper('letter', 'portrait');
        $name = 'Baja definitiva-'. $infoAlumno->NumControl . '.pdf';
        return $pdf->download($name);
    }

    public function printPDFtitulacion($id)
    {
        $infoAlumno = Alumnos::find($id);
        $departamentos = Departamentos::all();
        $today = Carbon::now();
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fecha = Carbon::parse($today);
        $mes = $meses[($fecha->format('n')) - 1];
        $today2 = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $pdf = \PDF::loadView('pdf.titulacion', compact( 'today2', 'infoAlumno', 'departamentos'));
        $pdf->setPaper('letter', 'portrait');
        $name = 'Titulacion-'. $infoAlumno->NumControl . '.pdf';
        return $pdf->download($name);
    }

    public function printPDFposgrado($id)
    {
        $infoAlumno = Alumnos::find($id);
        $departamentos = Departamentos::all();
        $today = Carbon::now();
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fecha = Carbon::parse($today);
        $mes = $meses[($fecha->format('n')) - 1];
        $today2 = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $pdf = \PDF::loadView('pdf.posgrado', compact( 'today2', 'infoAlumno', 'departamentos'));
        $pdf->setPaper('letter', 'portrait');
        $name = 'Posgrado-'. $infoAlumno->NumControl . '.pdf';
        return $pdf->download($name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'idDepartamento' => 'required',
            'descripcion' => 'required',
        ]);

        $request['idUser'] = auth()->user()->id;
        Adeudos::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Adeudos $adeudos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumnos::find($id);
        $adeudos = Adeudos::where('idAlumno', $id)->get();
        $departamentos = Departamentos::all();
        if ($alumnos != null) {
            return view('adeudos.show', compact('alumnos', 'adeudos', 'departamentos'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Adeudos $adeudos
     * @return \Illuminate\Http\Response
     */
    public function edit(Adeudos $adeudos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Adeudos $adeudos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adeudos $adeudos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Adeudos $adeudos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adeudos = Adeudos::find($id);

        if ($adeudos != null) {

            if ($adeudos->delete()) {
                return redirect()->back();

            }
        }
        return redirect()->route('adeudos.index')->with('mensaje', 'Es posible que el adeudo con este Id no exista');

    }
}
