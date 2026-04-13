<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del pedido</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .card{
            max-width: 900px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td{
            border: 1px solid #ddd;
        }
        th, td{
            padding: 10px;
            text-align: left;
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

    <h1>Detalle del pedido</h1>

    <div class="card">
        <p><strong>ID Pedido:</strong> {{ $pedido->id }}</p>
        <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
        <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
        <p><strong>Estado:</strong> {{ $pedido->estado }}</p>

        <h3>Productos</h3>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                        <td>${{ number_format($producto->pivot->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Total: ${{ number_format($pedido->total, 2) }}</h2>
    </div>

    <a href="{{ route('pedidos.index') }}" class="btn">Volver</a>

</body>
</html>