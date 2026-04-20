<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle | {{ $producto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 20px; border: none; overflow: hidden; }
        .label-custom { font-size: 0.7rem; text-transform: uppercase; color: #6c757d; font-weight: 800; letter-spacing: 0.5px; }
        .value-custom { font-size: 1.1rem; color: #333; font-weight: 600; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg">
                <div class="bg-dark p-4 text-center">
                    <div class="text-white bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                    <h5 class="text-white mb-0">Información producto</h5>
                </div>

                <div class="card-body p-4">
                    <div class="mb-4">
                        <span class="label-custom">Nombre del Producto</span>
                        <p class="value-custom mb-0">{{ $producto->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <span class="label-custom">Descripción</span>
                        <p class="text-muted" style="line-height: 1.4;">{{ $producto->descripcion }}</p>
                    </div>

                    <div class="row mb-4 g-0">
                        <div class="col-6 border-end text-center">
                            <span class="label-custom d-block">Precio</span>
                            <span class="value-custom text-success fs-4">${{ number_format($producto->precio, 2) }}</span>
                        </div>
                        <div class="col-6 text-center text-center">
                            <span class="label-custom d-block">Stock</span>
                            <span class="value-custom {{ $producto->stock <= 5 ? 'text-danger' : 'text-primary' }} fs-4">
                                {{ $producto->stock }} <small class="fw-normal fs-6">uds</small>
                            </span>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-outline-warning fw-bold">
                            <i class="bi bi-pencil me-2"></i>Editar Producto
                        </a>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Volver al Listado
                        </a>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 text-center py-3">
                    <small class="text-muted">ID de Registro: #00{{ $producto->id }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>