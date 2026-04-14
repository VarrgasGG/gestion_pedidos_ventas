<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .btn{
            display: inline-block;
            padding: 8px 14px;
            text-decoration: none;
            background: #0d6efd;
            color: white;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
        .btn-danger{
            background: #dc3545;
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
        .mensaje{
            padding: 10px;
            border-radius: 6px;
            margin-top: 20px;
        }
        .success{
            background: #d1e7dd;
            color: #0f5132;
        }
        .error{
            background: #f8d7da;
            color: #842029;
        }
        form{
            display:inline;
        }
    </style>
</head>
<body>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Inicio</a>

    <h1>Listado de pedidos</h1>

    <a href="{{ route('pedidos.create') }}" class="btn">Nuevo pedido</a>

    @if(session('success'))
        <div class="mensaje success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="mensaje error">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nombre }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn">Ver</a>

                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pedidos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>