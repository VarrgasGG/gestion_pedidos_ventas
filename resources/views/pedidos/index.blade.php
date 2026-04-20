<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 15px; border: none; }
        .badge-pendiente { background-color: #ffeeba; color: #856404; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 mb-2">
                <i class="bi bi-house-door"></i> Inicio
            </a>
            <h1 class="fw-bold h3 text-dark"><i class="bi bi-cart-check me-2"></i>Gestión de Pedidos</h1>
        </div>
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Pedido
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm mb-4">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidos as $pedido)
                            <tr>
                                <td class="ps-4 fw-bold">#{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente->nombre }}</td>
                                <td>{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y') }}</td>
                                
                                <td>
                                    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PUT')
                                        <select name="estado" 
                                                class="form-select form-select-sm rounded-pill border-0 shadow-sm px-3 
                                                       {{ $pedido->estado == 'finalizado' ? 'bg-success text-white' : 'badge-pendiente' }}" 
                                                onchange="this.form.submit()"
                                                style="width: 130px; cursor: pointer;">
                                            <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="finalizado" {{ $pedido->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                            <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        </select>
                                    </form>
                                </td>
                    
                                <td class="fw-bold text-primary">${{ number_format($pedido->total, 2) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-sm btn-light border">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar pedido?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center py-5 text-muted">No hay pedidos registrados.</td></tr>
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