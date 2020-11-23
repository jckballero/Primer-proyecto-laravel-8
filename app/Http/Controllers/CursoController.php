<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{   //Cuando queremos que administre mas de una ruta, debemos nombre una funcion por cada ruta
    public function index(){ //por convencion, se llama al metodo encargado de mostrar la pagina principal Index
        
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        // return $cursos;

        return view('cursos.index', compact('cursos')); //con el punto le indicamos que esta dentro de la carpeta
    }

    public function create() { //por convencion, el metodo encargado de mostrar el formulario para crear un curos etc, le llamamos create
        return view('cursos.create');
    }

    public function store(Request $request) {
        $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }

    public function show(Curso $curso) {//Por convencion llamaremos al metodo de mostrarnos un elmento en particular le llamos
        
        //return view('cursos.show', ['curso' => $curso]); //por medio del array enviamos la variable o la informacion que queramos a nuestro metodo  
        return view('cursos.show', compact('curso')); //esta es otra manera de enviar la variable
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso) {
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }
}