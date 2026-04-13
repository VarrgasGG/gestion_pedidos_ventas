<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
    <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>

    <h1>Listado de clientes</h1>

    <a href="{{ route('clientes.create') }}" class="btn">Nuevo cliente</a>

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
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td class="acciones">
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>