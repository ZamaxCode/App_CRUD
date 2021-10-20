<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth')->except("index", 'show');
    }
    
    public function index()
    {
        $personas = Persona::with('areas:id,nombre_area')->get();
        //$personas = Auth::user()->personas;
        return view('persona/persona_index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('persona/persona_create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'max:255',
            'codigo' => 'required|max:255|unique:App\Models\Persona,codigo',
            'correo' => 'email|max:255',
            'telefono' => 'max:50'
        ]);

        //Auth::user()->personas()->save($persona);

        $request->merge([
            'user_id' => Auth::id(),
            'apellido_materno' => $request->apellido_materno ?? ''
        ]);
        $persona = Persona::create($request->all());
        $persona->areas()->attach($request->area_id);

        /*$persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno ?? '';
        $persona->codigo = $request->codigo;
        $persona->correo = $request->correo ?? '';
        $persona->telefono = $request->telefono ?? '';

        $persona->save();*/

        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('persona/persona_show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        $areas = Area::all();
        return view('persona/persona_create', compact('persona', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([

            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'max:255',
            'codigo' => [
                        'required',
                        Rule::unique('personas')->ignore($persona->id)
                    ],
            'correo' => 'email|max:255',
            'telefono' => 'max:50'

        ]);

        Persona::where('id', $persona->id)->update($request->except('_token', '_method', 'area_id'));
        $persona->areas()->sync($request->area_id);

        /*$persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno ?? '';
        $persona->codigo = $request->codigo;
        $persona->telefono = $request->telefono ?? '';
        $persona->correo = $request->correo ?? '';
        $persona->save();*/

        return redirect()->route('persona.show', $persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('persona.index');
    }
}
