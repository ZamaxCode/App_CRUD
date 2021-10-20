<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona - Crear</title>
</head>
<body>
    <h1>Crear persona</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($persona))
        <form action="{{route('persona.update', $persona)}}" method="post">
        @method('PATCH')
    @else
        <form action="{{route('persona.store')}}" method="post">
    @endif
    
        @csrf

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" value="{{$persona->nombre ?? ''}}"><br><br>
        
        <label for="apellido_paterno">Apellido Paterno</label><br>
        <input type="text" name="apellido_paterno" value="{{$persona->apellido_paterno ?? ''}}"><br><br>

        <label for="apellido_materno">Apellido Materno</label><br>
        <input type="text" name="apellido_materno" value="{{$persona->apellido_materno ?? ''}}"><br><br>
        
        <label for="codigo">Codigo</label><br>
        <input type="text" name="codigo" value="{{$persona->codigo ?? ''}}"><br><br>
        
        <label for="correo">Correo</label><br>
        <input type="text" name="correo" value="{{$persona->correo ?? ''}}"><br><br>

        <label for="telefono">Telefono</label><br>
        <input type="text" name="telefono" value="{{$persona->telefono ?? ''}}"><br><br>

        <label for="area_id">Area:</label><br>
        <select name="area_id[]" id="area_id" multiple>
            @foreach($areas as $area)
                <option value="{{ $area->id }}" {{ isset($persona) && array_search($area->id, $persona->areas->pluck('id')->toArray()) === false ? '' : 'selected' }}>
                    "{{ $area->nombre_area }}"
                </option>
            @endforeach
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>