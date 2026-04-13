<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear producto</title>
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
            display: inline-block;
            margin-bottom: 20px;
        }
        .error{
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Crear producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Descripción</label>
        <input type="text" name="descripcion" value="{{ old('descripcion') }}">
        @error('descripcion')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Precio</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}">
        @error('precio')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn">Volver</a>
    </form>

</body>
</html>