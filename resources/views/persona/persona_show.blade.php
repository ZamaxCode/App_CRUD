<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona - Mostrar</title>
</head>
<body>
    <h1>Informacion de {{ $persona->nombre }}</h1>
    <a href="{{ route('persona.index') }}">Regresar</a>
    <ul>
        <li>{{$persona->apellido_paterno}}</li>
        <li>{{$persona->apellido_materno}}</li>
        <li>{{$persona->codigo}}</li>
        <li>{{$persona->telefono}}</li>
        <li>{{$persona->correo}}</li>
    </ul>
    <hr>
    Usuario Creador: {{ $persona->user->name }} ({{ $persona->user->email }})
    <hr>
    <a href="{{route('persona.edit', $persona)}}">Editar</a>
    <hr>
    <form action="{{route('persona.destroy', $persona)}}" method="POST">
        @method('DELETE')    
        @csrf
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>