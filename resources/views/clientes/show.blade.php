<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Cliente | Gestión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }
        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #6c757d;
            font-weight: bold;
        }
        .info-value {
            font-size: 1.1rem;
            color: #212529;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow-lg">
                <div class="card-header bg-primary py-4 text-center border-0">
                    <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                        <i class="bi bi-person-badge text-white fs-1"></i>
                    </div>
                    <h3 class="text-white fw-bold h5 mb-0">Información del Cliente</h3>
                </div>

                <div class="card-body p-4">
                    <div class="mb-4 text-center">
                        <span class="badge bg-light text-primary rounded-pill px-3">ID #{{ $cliente->id }}</span>
                    </div>

                    <div class="mb-3 border-bottom pb-2">
                        <p class="info-label mb-1">Nombre Completo</p>
                        <p class="info-value fw-bold text-dark">{{ $cliente->nombre }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 border-end">
                            <p class="info-label mb-1">Teléfono</p>
                            <p class="info-value"><i class="bi bi-telephone-fill me-2 text-muted small"></i>{{ $cliente->telefono }}</p>
                        </div>
                        <div class="col-6 ps-3">
                            <p class="info-label mb-1">Email</p>
                            <p class="info-value text-primary text-truncate">{{ $cliente->email }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="info-label mb-1">Dirección de Entrega</p>
                        <p class="info-value"><i class="bi bi-geo-alt-fill me-2 text-muted small"></i>{{ $cliente->direccion }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning text-white fw-bold rounded-pill shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i>Editar Información
                        </a>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Volver al Listado
                        </a>
                    </div>
                </div>
                
                <div class="card-footer bg-light text-center py-3 border-0">
                    <small class="text-muted">Registrado en el sistema • Gestión de Ventas</small>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>