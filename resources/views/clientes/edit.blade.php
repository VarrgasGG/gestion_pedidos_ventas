<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar cliente</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form{
            max-width: 500px;
        }
        input{
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        .btn{
            padding: 10px 16px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .error{
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

    <h1>Editar cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}">
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
        @error('telefono')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $cliente->email) }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Dirección</label>
        <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
        @error('direccion')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn">Volver</a>
    </form>

</body>
</html>