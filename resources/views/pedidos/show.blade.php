<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Pedido #{{ $pedido->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 20px; border: none; }
        .table-resumen { background: #fcfcfc; border-radius: 12px; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-lg overflow-hidden">
                <div class="card-header bg-dark text-white p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h4 mb-0 fw-bold">PEDIDO #{{ $pedido->id }}</h1>
                        <span class="badge bg-primary px-3 py-2 text-uppercase">{{ $pedido->estado }}</span>
                    </div>
                </div>
                <div class="card-body p-4 p-md-5">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3">
                            <h6 class="text-uppercase text-muted small fw-bold">Información del Cliente</h6>
                            <p class="fs-5 mb-1 fw-bold text-dark">{{ $pedido->cliente->nombre }}</p>
                            <p class="text-muted small"><i class="bi bi-geo-alt me-1"></i> {{ $pedido->cliente->direccion ?? 'Sin dirección' }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h6 class="text-uppercase text-muted small fw-bold">Fecha de Emisión</h6>
                            <p class="fs-5">{{ \Carbon\Carbon::parse($pedido->fecha)->format('d \d\e F, Y') }}</p>
                        </div>
                    </div>

                    <h6 class="text-uppercase text-muted small fw-bold mb-3">Resumen de Productos</h6>
                    <div class="table-responsive mb-4">
                        <table class="table table-borderless align-middle table-resumen">
                            <thead class="border-bottom">
                                <tr class="text-muted small">
                                    <th class="py-3 px-4">PRODUCTO</th>
                                    <th class="py-3 text-center">CANTIDAD</th>
                                    <th class="py-3 text-end">UNITARIO</th>
                                    <th class="py-3 text-end px-4">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedido->productos as $producto)
                                    <tr class="border-bottom">
                                        <td class="py-3 px-4 fw-bold text-dark">{{ $producto->nombre }}</td>
                                        <td class="py-3 text-center">{{ $producto->pivot->cantidad }}</td>
                                        <td class="py-3 text-end">${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                                        <td class="py-3 text-end px-4 fw-bold">${{ number_format($producto->pivot->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-between align-items-center p-3 bg-primary text-white rounded shadow-sm">
                                <span class="h5 mb-0 fw-light">TOTAL</span>
                                <span class="h3 mb-0 fw-bold">${{ number_format($pedido->total, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 d-flex gap-2">
                        <button onclick="window.print()" class="btn btn-outline-dark px-4 rounded-pill">
                            <i class="bi bi-printer me-2"></i>Imprimir Factura
                        </button>
                        <a href="{{ route('pedidos.index') }}" class="btn btn-link text-muted ms-auto">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>