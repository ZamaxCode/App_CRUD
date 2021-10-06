<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona - Inicio</title>
</head>
<body>
    <h1>Bienvenido a Persona</h1>

    <a href="{{ route('persona.create') }}">Crear persona</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apelido Paterno</th>
                <th>Apellido Materno</th>
                <th>Codigo</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td><a href="{{ route('persona.show', $persona) }}"> {{ $persona->id }} </a></td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellido_paterno }}</td>
                    <td>{{ $persona->apellido_materno }}</td>
                    <td>{{ $persona->codigo }}</td>
                    <td>{{ $persona->correo }}</td>
                    <td>{{ $persona->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>