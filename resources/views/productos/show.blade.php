<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver producto</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .card{
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 20px;
        }
        .btn{
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 20px;
            padding: 10px 16px;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <h1>Detalle del producto</h1>

    <div class="card">
        <p><strong>ID:</strong> {{ $producto->id }}</p>
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> {{ $producto->precio }}</p>
        <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    </div>

    <a href="{{ route('productos.index') }}" class="btn">Volver</a>

</body>
</html>