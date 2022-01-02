<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use Illuminate\Http\Request;
use Image;

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
            $width = Image::make($image)->width();
            $height = Image::make($image)->height();
            $mask = Image::make($image)
                ->contrast(100)
                ->contrast(50)
                ->trim('top-left', null, 40)
                ->invert(); // invert it to use as a mask

            $new_image = Image::canvas($mask->width(), $mask->height(), '#000000')
                ->mask($mask)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('png', 100);
            $name = 'sello-' . $request->nombreDepartamento . '.png';
            $destinationPath = public_path('/img');
            $new_image->save($destinationPath . '/' . $name);
            $request['sello'] = $name;


            $imagefirma = $request->file('firmaimg');
            $width = Image::make($imagefirma)->width();
            $height = Image::make($imagefirma)->height();
            $maskfirma = Image::make($imagefirma)
                ->contrast(100)
                ->contrast(50)
                ->trim('top-left', null, 40)
                ->invert(); // invert it to use as a mask

            $new_imageFirma = Image::canvas($maskfirma->width(), $maskfirma->height(), '#061ABB')
                ->mask($maskfirma)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('png', 100);
            $nameFirma = 'firma-' . $request->nombreDepartamento . '.png';
            $destinationPath = public_path('/img');
            $new_imageFirma->save($destinationPath . '/' . $nameFirma);
            $request['firma'] = $nameFirma;


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

        if ($request->hasFile('selloimg')) {
            $image = $request->file('selloimg');
            $width = Image::make($image)->width();
            $height = Image::make($image)->height();
            $mask = Image::make($image)
                ->contrast(100)
                ->contrast(50)
                ->trim('top-left', null, 40)
                ->invert(); // invert it to use as a mask

            $new_image = Image::canvas($mask->width(), $mask->height(), '#061ABB')
                ->mask($mask)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('png', 100);
            $name = 'sello-' . $request->nombreDepartamento . '.png';
            $destinationPath = public_path('/img');
            $new_image->save($destinationPath . '/' . $name);
            $request['sello'] = $name;
            $departamento->update(['sello' => $name]);
        }

        if ($request->hasFile('firmaimg')) {

            $imagefirma = $request->file('firmaimg');
            $width = Image::make($imagefirma)->width();
            $height = Image::make($imagefirma)->height();
            $maskfirma = Image::make($imagefirma)
                ->contrast(100)
                ->contrast(50)
                ->trim('top-left', null, 40)
                ->invert(); // invert it to use as a mask

            $new_imageFirma = Image::canvas($maskfirma->width(), $maskfirma->height(), '#061ABB')
                ->mask($maskfirma)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('png', 100);
            $nameFirma = 'firma-' . $request->nombreDepartamento . '.png';
            $destinationPath = public_path('/img');
            $new_imageFirma->save($destinationPath . '/' . $nameFirma);
            $request['firma'] = $nameFirma;
            $departamento->update(['firma' => $nameFirma]);
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
        //code for remove old file


        if ($departamento != null) {

            if ($departamento->delete()) {
                $file_old = public_path('/img/') . $departamento->sello;
                unlink($file_old);

                $file_old = public_path('/img/') . $departamento->firma;
                unlink($file_old);
                return redirect()->route('departamentos.index')->with('mensaje', 'departamento eliminado correctamente');

            }
        }
        return redirect()->route('departamentos.index')->with('mensaje', 'Es posible que el departamento con este Id no exista');

    }
}
