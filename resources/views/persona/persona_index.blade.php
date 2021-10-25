@extends('layouts.mi-layout')
@section('contenido')
    <h1>Bienvenido a Persona</h1>

    <a href="{{ route('persona.create') }}">Crear persona</a>

    <table border="1">
        <thead>
            <tr>
                <th>Areas</th>
                <th>Id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apelido Paterno</th>
                <th>Apellido Materno</th>
                <th>Codigo</th>
                <th>Correo</th>
                <th>Telefono</th>   
                <th>Nombre Completo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td>
                        <ol>
                            @foreach($persona->areas as $area)
                                <li>{{ $area->nombre_area }}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td><a href="{{ route('persona.show', $persona) }}"> {{ $persona->id }} </a></td>
                    <td>{{ $persona->user->name }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellido_paterno }}</td>
                    <td>{{ $persona->apellido_materno }}</td>
                    <td>{{ $persona->codigo }}</td>
                    <td>{{ $persona->correo }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->nombre_completo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection