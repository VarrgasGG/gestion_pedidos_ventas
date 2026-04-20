<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 15px; border: none; }
        .table thead { background-color: #f8f9fa; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 mb-2">
                <i class="bi bi-arrow-left"></i> Panel Principal
            </a>
            <h1 class="fw-bold h3 text-dark"><i class="bi bi-people-fill me-2"></i>Listado de Clientes</h1>
        </div>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td class="ps-4 text-muted fw-bold">#{{ $cliente->id }}</td>
                                <td class="fw-bold">{{ $cliente->nombre }}</td>
                                <td><i class="bi bi-telephone text-muted me-1"></i> {{ $cliente->telefono }}</td>
                                <td><i class="bi bi-envelope text-muted me-1"></i> {{ $cliente->email }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $cliente->direccion }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-light border" title="Ver detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No hay clientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>