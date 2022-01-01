<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class C_informacionController extends Controller
{

    public function index()
    {
        //Con paginación
        $blogs = Blog::paginate(5);
        return view('c_informacion/index');

    }

    public function create()
    {
        return view('c_informacion.crear');
    }

    public function store(Request $request)
    {
        request()->validate([
            'Nombre' => 'required',
            'ApellidoPat' => 'required',
            'ApellidoMat' => 'required',
            'ApellidoMat' => 'required',
            'NumControl' => 'required',
            'Carrera' => 'required',

        ]);

        Blog::create($request->all());

        return redirect()->route('alumnos.index');
    }

    public function edit(C_info $blog)
    {
        return view('c_informacion.editar', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'Nombre' => 'required',
            'ApellidoPat' => 'required',
            'ApellidoMat' => 'required',
            'NumControl' => 'required',
            'Carrera' => 'required',

        ]);

        $blog->update($request->all());

        return redirect()->route('c_informacion.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('alumnos.index');
    }
}
