<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver cliente</title>
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
        }
        .btn{
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>

    <h1>Detalle del cliente</h1>

    <div class="card">
        <p><strong>ID:</strong> {{ $cliente->id }}</p>
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>
        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    </div>

    <a href="{{ route('clientes.index') }}" class="btn">Volver</a>

</body>
</html>