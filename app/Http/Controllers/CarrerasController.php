<?php

namespace App\Http\Controllers;

use App\Models\carreras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:ver-blog|crear-blog|editar-blog|borrar-blog')->only('index');
        $this->middleware('permission:crear-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-blog', ['only' => ['destroy']]);
        //middleware para buscador
        //$this->middleware('permission:buscar-blog',['only'=>['search']]);
    }

    public function index()
    {
        //
        //Con paginación
        $carreras = carreras::paginate(10);
        return view('carreras.index', compact('carreras'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $alumnos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:carreras',
        ]);
        carreras::create($request->all());

        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function show(carreras $carreras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function edit(carreras $carreras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carreras $carreras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carreras = carreras::find($id);

        if ($carreras != null){

            if ($carreras->delete()) {
                return redirect()->route('carreras.index')->with('mensaje', 'colaborador eliminado correctamente');

            }
        }
        return redirect()->route('carreras.index')->with('mensaje', 'Es posible que el colaborador con este Id no exista');

    }
}
