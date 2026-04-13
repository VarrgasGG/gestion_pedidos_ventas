<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
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
        .btn-warning{
            background: #ffc107;
            color: black;
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
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            border-radius: 6px;
            margin-top: 20px;
        }
        .acciones{
            display: flex;
            gap: 8px;
            align-items: center;
        }
        form{
            display: inline;
        }
    </style>
</head>
<body>

    <a href="{{ route('home') }}" class="btn">Inicio</a>

    <h1>Listado de productos</h1>

    <a href="{{ route('productos.create') }}" class="btn">Nuevo producto</a>

    @if(session('success'))
        <div class="mensaje">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td class="acciones">
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn">Ver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>