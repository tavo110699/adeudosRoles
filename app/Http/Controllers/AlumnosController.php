<?php

namespace App\Http\Controllers;

use App\Mail\createProject;
use App\Mail\registroAlumno;
use App\Models\Alumnos;
use App\Models\carreras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlumnosController extends Controller
{
    function __construct()
    {
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
    public function index()
    {
        //Con paginación
        $alumnos = Alumnos::paginate(10);
        return view('alumnos.index', compact('alumnos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $alumnos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = carreras::all();
        return view('alumnos.crear', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'Nombre' => 'required',
            'ApellidoP' => 'required',
            'ApellidoM' => 'required',
            'NumControl' => 'required',
            'carreraid' => 'required',
        ]);

        Alumnos::create($request->all());

        $email = new registroAlumno;

        Mail::to('gustavo.marlic@gmail.com')->send($email);
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos = Alumnos::find($id);
        $carreras = Carreras::all();
        if ($alumnos != null) {
            return view('alumnos.editar', compact('alumnos', 'carreras'));
        }
        abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
            'Nombre' => 'required',
            'ApellidoP' => 'required',
            'ApellidoM' => 'required',
            'NumControl' => 'required',
            'carreraid' => 'required',

        ]);
        $alumno = Alumnos::find($id);
        $alumno->update($request->all());

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::find($id);

        if ($alumno != null){

            if ($alumno->delete()) {
                return redirect()->route('alumnos.index')->with('mensaje', 'Alumno eliminado correctamente');

            }
        }
        return redirect()->route('alumnos.index')->with('mensaje', 'Es posible que el alumno con este Id no exista');

    }
}




