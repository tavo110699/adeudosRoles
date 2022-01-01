<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use Illuminate\Http\Request;


class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Con paginación
        $departamentos = Departamentos::paginate(10);
        return view('departamentos.index', compact('departamentos'));
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
        return view('departamentos.create');
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
        $this->validate($request, [
            'nombreDepartamento' => 'required|max:255',
            'nombreEncargado' => 'required',
            'apellidoPEncargado' => 'required',
            'apellidoMEncargado' => 'required',
            'selloimg' => 'required|image',
            'firmaimg' => 'required|image',
        ]);

        if ($request->hasFile('selloimg') && $request->hasFile('firmaimg')) {
            $image = $request->file('selloimg');
            $name = 'sello-' . $request->nombreDepartamento . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $request['sello'] = $name;

            $imagefirma = $request->file('firmaimg');
            $namefirma = 'firma-' . $request->nombreDepartamento . '.' . $imagefirma->getClientOriginalExtension();
            $destinationPathfirma = public_path('/img');
            $imagefirma->move($destinationPathfirma, $namefirma);
            $request['firma'] = $namefirma;

            Departamentos::create($request->all());
            return redirect()->route('departamentos.index')->with('mensaje', 'departamento agregado con exito');
        }

        return redirect()->route('departamentos.index')->with('mensaje', 'hubo un problema al agregr departamento');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Departamentos $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Departamentos $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $departamentos = Departamentos::find($id);
        return view('departamentos.edit', compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Departamentos $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombreDepartamento' => 'required|max:255',
            'nombreEncargado' => 'required',
            'apellidoPEncargado' => 'required',
            'apellidoMEncargado' => 'required',
        ]);
        $departamento = Departamentos::find($id);

        //code for remove old file
        if ($request['sello'] != '' && $request['sello'] != null) {
            $file_old = public_path('/img/') . $departamento->sello;
            unlink($file_old);
        }

        //code for remove old file
        if ($request['firma'] != '' && $request['firma'] != null) {
            $file_old = public_path('/img/') . $departamento->firma;
            unlink($file_old);
        }

        if ($request->hasFile('selloimg')){
        $image = $request->file('selloimg');
        $name = 'sello-' . $request->nombreDepartamento . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $name);
        $request['sello'] = $name;
        $departamento->update(['sello' => $name]);
    }

        if ($request->hasFile('firmaimg')) {

            $imagefirma = $request->file('firmaimg');
            $namefirma = 'firma-' . $request->nombreDepartamento . '.' . $imagefirma->getClientOriginalExtension();
            $destinationPathfirma = public_path('/img');
            $imagefirma->move($destinationPathfirma, $namefirma);
            $request['firma'] = $namefirma;
            $departamento->update(['firma' => $namefirma]);
        }


        if ($departamento != null) {
            if ($departamento->update($request->all())) {
                return redirect()->route('departamentos.index');
            }
        }


        return redirect()->route('departamentos.index')->with('mensaje', 'departamento agregado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Departamentos $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $departamento = Departamentos::find($id);

        if ($departamento != null) {

            if ($departamento->delete()) {
                return redirect()->route('departamentos.index')->with('mensaje', 'departamento eliminado correctamente');

            }
        }
        return redirect()->route('departamentos.index')->with('mensaje', 'Es posible que el departamento con este Id no exista');

    }
}
