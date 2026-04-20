<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 15px; border: none; }
        .price-tag { font-size: 1.1rem; font-weight: bold; color: #198754; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-primary rounded-pill mb-2 px-3">
                <i class="bi bi-house"></i> Inicio
            </a>
            <h1 class="fw-bold h3 text-dark"><i class="bi bi-box-seam me-2"></i>Inventario de Productos</h1>
        </div>
        <a href="{{ route('productos.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                <td class="ps-4 text-muted small">#{{ $producto->id }}</td>
                                <td class="fw-bold">{{ $producto->nombre }}</td>
                                <td class="text-muted small" style="max-width: 250px;">{{ Str::limit($producto->descripcion, 50) }}</td>
                                <td class="price-tag">${{ number_format($producto->precio, 2) }}</td>
                                <td>
                                    @if($producto->stock <= 0)
                                        <span class="badge bg-danger rounded-pill px-3">Agotado</span>
                                    @elseif($producto->stock <= 5)
                                        <span class="badge bg-warning text-dark rounded-pill px-3">Bajo ({{ $producto->stock }})</span>
                                    @else
                                        <span class="badge bg-success rounded-pill px-3">{{ $producto->stock }} unidades</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group shadow-sm">
                                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-white border"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center py-5 text-muted">No hay productos en el inventario.</td></tr>
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